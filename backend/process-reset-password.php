<?php
require __DIR__ . '/db.php';

$token = $_POST["token"];
$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM user WHERE reset_token_hash = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Invalid or expired token.");
}
if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired.");
}

$password = $_POST["password"];
$confirm = $_POST["password_confirmation"];

if (strlen($password) < 8 || !preg_match("/[a-z]/i", $password) || !preg_match("/[0-9]/", $password)) {
    die("Password must be at least 8 characters and contain letters and numbers.");
}
if ($password !== $confirm) {
    die("Passwords do not match.");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE user SET passwordHash = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $password_hash, $user["userID"]);
$stmt->execute();

echo "<script>alert('Password successfully updated. You may now login.'); window.location.href = '../frontend/login.php';</script>";
