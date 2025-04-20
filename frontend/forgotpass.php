<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/forgotpass.css">
</head>
<body>
    <div class="forgot-container">
        <h2>Forgot Password</h2>
        <form action="../backend/send-password-reset.php" method="POST">
            <div class="input-field">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="reset-btn">Reset Password</button>
            <p>Remembered? <a href="login.php">Login</a></p>
        </form>
    </div>
    <script src="../js/forgotpass.js"></script>
</body>
</html>