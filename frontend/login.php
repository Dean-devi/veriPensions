<?php
session_start();
include "../backend/db.php";

// Check if user is already logged in
if (isset($_SESSION['userID'])) {
    header("Location: ../admin.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="login-container">
        <div class="left-side">
            <img src="../img/logo3.png" alt="Illustration">
        </div>
        <div class="right-side">
            <h2>Sign in</h2>
            <form  action="../backend/loginAuth.php" method="POST" autocomplete="on">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" placeholder="Email" required autocomplete="on">
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" id="password" required autocomplete="new-password">
                    <span class="toggle-password" id="togglePassword">
                    <i class="fa fa-eye-slash" id="eye-icon"></i>
                    </span>
                </div>                             
                <p>Forgot password?<a href="forgotpass.php" class="click-here"> Click here</a></p>
                <p id="login-status" class="text-danger"><?php
                        if (isset($_SESSION['error'])) {
                            echo htmlspecialchars($_SESSION['error']);
                            unset($_SESSION['error']); // clear it after displaying
                        }
                ?></p>
                
                <button type="submit" class="login-btn">Login</button>
                <p>Don't have an account?<a href="signup.php" class="sign-up">Sign up</a></p>
            </form>
        </div>
    </div>

    <!-- script for login -->
     <script src="../js/login.js"></script>
    <script>

    </script>

</body>
</html>
