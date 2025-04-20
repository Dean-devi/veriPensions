<?php
require __DIR__ . '/db.php';

$email = $_POST["email"];
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30); // 30 mins

$sql = "UPDATE user SET reset_token_hash = ?, reset_token_expires_at = ? WHERE user_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($conn->affected_rows > 0) {
    $mail = require __DIR__ . '/mailer.php';
    $mail->addAddress($email);
    $mail->Subject = "Reset your VeriPension password";
    $mail->isHTML(true);
    $mail->Body = <<<HTML
        <h2>VeriPension Password Reset</h2>
        <p>Click the link below to reset your password (expires in 30 minutes):</p>
        <a href="http://localhost/veriPension/frontend/reset-password.php?token=$token">Reset Password</a>
HTML;

    try {
        $mail->send();
        echo "<script>alert('Password reset link sent to your email.'); window.location.href = '../frontend/login.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send reset email.'); window.location.href = '../frontend/forgotpass.php';</script>";
    }
} else {
    echo "<script>alert('Email not found.'); window.location.href = '../frontend/forgotpass.php';</script>";
}
