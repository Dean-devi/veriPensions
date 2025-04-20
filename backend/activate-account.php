<?php
require __DIR__ . '/db.php';

$token = $_GET['token'] ?? '';
$token_hash = hash('sha256', $token);

$stmt = $conn->prepare("SELECT * FROM user WHERE account_activation_hash = ? AND dateDeleted IS NULL");
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    $stmt = $conn->prepare("UPDATE user SET account_activation_hash = NULL WHERE userID = ?");
    $stmt->bind_param("i", $user['userID']);
    $stmt->execute();

    echo "<h2>Account activated! You can now login.</h2>";
} else {
    echo "<h2>Invalid or expired activation link.</h2>";
}
