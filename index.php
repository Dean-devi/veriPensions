<?php
session_start();
include "db.php";

// Check if user is already logged in
if (isset($_SESSION['userID'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VeriPension - Secure Pension Verification</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.jpg" alt="VeriPension Logo" width="50">
        VeriPension
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Developers</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row w-100">
      <!-- Logo and Slogan (70% width) -->
      <div class="col-md-7 text-center">
        <img src="img/logo.jpg" alt="VeriPension Logo" class="img-fluid" width="200">
        <h1 class="mt-3">VeriPension</h1>
        <p class="lead">Ensuring secure and hassle-free pension verification for seniors.</p>
      </div>

      <!-- Login/Registration Form (30% width) -->
      <div class="col-md-5">
        <div class="card p-4 shadow">
          <h2 id="form-title">Login</h2>
          <form action="loginAuth.php" method="POST" id="login-form">
            <input type="text" class="form-control mb-2" name="username" placeholder="Username" required>
            <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-2">
              <a href="#" onclick="toggleForm()">Don't have an account? Register here</a>
            </p>
          </form>

          <form action="userAuth.php" method="POST" id="registration-form" style="display: none;">
            <input type="text" class="form-control mb-2" name="fullname" placeholder="Full Name" required>
            <input type="text" class="form-control mb-2" name="username" placeholder="Username" required>
            <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <p class="text-center mt-2">
              <a href="#" onclick="toggleForm()">Already have an account? Login here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center p-3 bg-light mt-4">
    &copy; <?php echo date("Y"); ?> VeriPension. All rights reserved.
  </footer>

  <script>
    function toggleForm() {
      const loginForm = document.getElementById('login-form');
      const registrationForm = document.getElementById('registration-form');
      const formTitle = document.getElementById('form-title');

      if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registrationForm.style.display = "none";
        formTitle.innerText = "Login";
      } else {
        loginForm.style.display = "none";
        registrationForm.style.display = "block";
        formTitle.innerText = "Register";
      }
    }
  </script>
</body>
</html>
