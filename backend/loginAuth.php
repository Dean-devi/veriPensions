<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Retrieve user record
    $stmt = $conn->prepare("SELECT userID, fullname, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Store user session
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: ../ryan/sidenavbar.html");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "Invalid username or password!";
    }
}
?>
