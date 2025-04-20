<?php
session_start();
require __DIR__ . '/db.php'; // update path if needed

$email = trim($_POST['email']);
$password = $_POST['password'];

// Basic validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Invalid email format.";
    header("Location: ../frontend/login.php");
    exit();
}

if (strlen($password) < 8) {
    $_SESSION['error'] = "Password must be at least 8 characters.";
    header("Location: ../frontend/login.php");
    exit();
}

// Check user in database
$stmt = $conn->prepare("SELECT * FROM user WHERE user_email = ? AND dateDeleted IS NULL");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (!password_verify($password, $user['passwordHash'])) {
        $_SESSION['error'] = "Incorrect password.";
        header("Location: ../frontend/login.php");
        exit();
    }

    if (!is_null($user['account_activation_hash'])) {
        $_SESSION['error'] = "Account not activated. Check your email.";
        header("Location: ../frontend/login.php");
        exit();
    }

    // Login successful
    $_SESSION['userID'] = $user['userID'];
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['userType'] = $user['userType'];

    header("Location: ../admin.php"); // adjust this if pensioner has different redirect
    exit();
} else {
    $_SESSION['error'] = "Account not found.";
    header("Location: ../frontend/login.php");
    exit();
}
