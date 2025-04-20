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
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="glassmorphism">
        <div class="form-container">
            <h2>Sign up</h2>
            
            

            <form id="signupForm" action="../backend/userAuth.php" method="POST" autocomplete="on">
            <div class="relative">
                <input type="email" id="email" name="email" placeholder="Email" autocomplete="on">
                <i class="fas fa-envelope"></i>
            </div>
            <p id="email-status" class="text-danger"><?php
                    if (isset($_SESSION['error'])) {
                        echo htmlspecialchars($_SESSION['error']);
                        unset($_SESSION['error']);
                    }
                ?></p>

            <div class="relative">
                <input type="text" id="fullname" name="fullname" placeholder="Fullname" autocomplete="on">
                <i class="fas fa-user"></i>
        
            </div>
            <p id="fullname-status" class="text-danger"></p>

            <div class="relative">
                <input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password">
                <i class="fas fa-lock"></i>
            </div>
            <p id="password-status" class="text-danger"></p>

            <div class="relative">
                <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                <i class="fas fa-lock"></i>
            </div>
            <p id="confirm-status" class="text-danger"></p>
            
                <button type="submit">SIGN UP</button>

                <?php if (isset($_SESSION['error']) || isset($_SESSION['success'])): ?>
                    <p id="signup-status" class="<?php echo isset($_SESSION['error']) ? 'text-danger' : 'text-success'; ?> text-center mt-2">
                        <?php
                            echo isset($_SESSION['error']) ? htmlspecialchars($_SESSION['error']) : htmlspecialchars($_SESSION['success']);
                            unset($_SESSION['error'], $_SESSION['success']);
                        ?>
                    </p>
                <?php endif; ?>

            </form>
            <p>Already have an account? <a href="login.php">Log in.</a></p>
        </div>
        <div class="image-container">
            <img src="../img/logo3.png" alt="Illustration">
        </div>
    </div>

    <!-- script for signin -->
     <script src="../js/signup.js"></script>
    <script>
            
        </script>




    
</body>
</html>
