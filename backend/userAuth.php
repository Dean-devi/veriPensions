<?php
include "../backend/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hash the password securely
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO user (fullname, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $username, $hashedpassword);

    if ($stmt->execute()) {
        header("Location: index.php?success=registered");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
}
?>
