<?php
if (!isset($_GET['token'])) {
    die("Token missing from URL.");
}

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

require __DIR__ . '/../backend/db.php';

$sql = "SELECT * FROM user WHERE reset_token_hash = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Invalid token.");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/reset-password.css"> 
</head>
<body>
    <div class="reset-container">
        <h2>Reset Your Password</h2>
        <form method="POST" action="../backend/process-reset-password.php">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            
            <label>New Password</label>
            <input type="password" name="password" required>

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
            <p id="confirm-status" class="text-danger"></p>
            <button type="submit">Update Password</button>
        </form>
    </div>

    <script>>
        document.addEventListener("DOMContentLoaded", function () {
    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");
    const confirmStatus = document.getElementById("confirm-status");

    // Live password match check
    confirmPassword.addEventListener("input", function () {
        if (confirmPassword.value !== newPassword.value) {
            confirmStatus.textContent = "Passwords do not match.";
        } else {
            confirmStatus.textContent = "";
        }
    });

    // Optional: Also validate on form submit to prevent submission
    const form = document.getElementById("resetForm");
    form.addEventListener("submit", function (e) {
        if (newPassword.value !== confirmPassword.value) {
            confirmStatus.textContent = "Passwords do not match.";
            e.preventDefault();
        }
    });
});
    </script>
</body>
</html>
