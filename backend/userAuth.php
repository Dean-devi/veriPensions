<?php
session_start();
require __DIR__ . '/db.php';

// Sanitize inputs
$name = trim($_POST['fullname']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$userType = 'pensioner'; // fixed role for self-registration

// Server-side validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Invalid email format.";
    header("Location: ../frontend/signup.php");
    exit;
}

if (strlen($password) < 8 || !preg_match("/[a-z]/i", $password) || !preg_match("/[0-9]/", $password)) {
    $_SESSION['error'] = "Password must be at least 8 characters and contain both letters and numbers.";
    header("Location: ../frontend/signup.php");
    exit;
}


if ($password !== $password_confirmation) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: ../frontend/signup.php");
    exit;
}

// Hash password and token
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$activation_token = bin2hex(random_bytes(16));
$activation_token_hash = hash("sha256", $activation_token);

// Start transaction
$conn->begin_transaction();

try {
    $stmt = $conn->prepare("INSERT INTO user (fullname, user_email, passwordHash, userType, account_activation_hash, dateCreated)
                            VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $name, $email, $passwordHash, $userType, $activation_token_hash);

    if (!$stmt->execute()) {
        if ($conn->errno === 1062) {
            throw new Exception("Email already registered.");
        } else {
            throw new Exception("Database error occurred.");
        }
    }

    // Load mailer
    $mail = require __DIR__ . '/mailer.php';
    $mail->addAddress($email, $name);
    $mail->Subject = "Activate your VeriPension Account";
    $mail->Body = <<<HTML
        <h2>Welcome to VeriPension!</h2>
        <p>Please click the link below to activate your account:</p>
        <a href="http://localhost/veriPension/backend/activate-account.php?token=$activation_token">
            Activate Account
        </a>
HTML;

    // Try sending email
    if (!$mail->send()) {
        throw new Exception("Signup successful, but failed to send email.");
    }

    // All good — commit transaction
    $conn->commit();
    $_SESSION['success'] = "Registration successful! Please check your email to activate your account.";
    header("Location: ../frontend/signup.php");
    exit;

} catch (Exception $e) {
    // Rollback DB insertion if anything fails
    $conn->rollback();
    $_SESSION['error'] = $e->getMessage();
    header("Location: ../frontend/signup.php");
    exit;
}
