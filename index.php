<?php
session_start();
include "backend/db.php";

// Check if user is already logged in
if (isset($_SESSION['userID'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>VeriPension - Secure Pension Verification</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/styles.css" />

  <style>
    /* NAVBAR STYLES */
    .navbar-nav .nav-link {
      font-size: 1.2rem;    /* Larger text */
      font-weight: bold;   /* Bolder text */
      transition: background-color 0.3s, color 0.3s;
    }
    .navbar-nav .nav-link:hover {
      background-color: #000; /* Black background on hover */
      color: #fff !important; /* White text on hover */
    }

    /* ROUNDED CARD */
    .rounded-card {
      border-radius: 20px;  /* Rounded corners */
    }

    /* FOOTER BLACK BACKGROUND */
    footer {
      background-color: #000; /* Black footer */
      color: #fff;            /* White text */
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="img/logo.jpg" alt="VeriPension Logo" width="50" class="me-2">
        <span>VeriPension</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
      <div class="col-md-7 text-center d-flex flex-column align-items-center justify-content-center">
        <img src="img/logo.jpg" alt="VeriPension Logo" class="img-fluid" width="200">
        <h1 class="mt-3">VeriPension</h1>
        <p class="lead">Ensuring secure and hassle-free pension verification for seniors.</p>
      </div>

      <!-- Login/Registration Form (30% width) -->
      <div class="col-md-5 d-flex align-items-center">
        <div class="card p-4 shadow rounded-card w-100">
          <h2 id="form-title" class="text-center">Login</h2>

          <!-- LOGIN FORM -->
          <form action="backend/loginAuth.php" method="POST" id="login-form">
            <div class="form-floating mb-3">
              <input 
                type="text" 
                class="form-control" 
                id="login-username" 
                name="username" 
                placeholder="Username" 
                required
              >
              <label for="login-username">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input 
                type="password" 
                class="form-control" 
                id="login-password" 
                name="password" 
                placeholder="Password" 
                required
              >
              <label for="login-password">Password</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-2">
              <small>
                Don't have an account? 
                <a href="#" onclick="toggleForm()">Register here</a>
              </small>
            </p>
          </form>

          <!-- REGISTRATION FORM (hidden by default) -->
          <form action="backend/userAuth.php" method="POST" id="registration-form" style="display: none;">
            <div class="form-floating mb-3">
              <input 
                type="text" 
                class="form-control" 
                id="reg-fullname" 
                name="fullname" 
                placeholder="Full Name" 
                required
              >
              <label for="reg-fullname">Full Name</label>
            </div>
            <div class="form-floating mb-3">
              <input 
                type="text" 
                class="form-control" 
                id="reg-username" 
                name="username" 
                placeholder="Username" 
                required
              >
              <label for="reg-username">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input 
                type="password" 
                class="form-control" 
                id="reg-password" 
                name="password" 
                placeholder="Password" 
                required
              >
              <label for="reg-password">Password</label>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <p class="text-center mt-2">
              <small>
                Already have an account?
                <a href="#" onclick="toggleForm()">Login here</a>
              </small>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer (Black) -->
  <footer class="text-center p-3 mt-4">
    &copy; <?php echo date("Y"); ?> VeriPension. All rights reserved.
  </footer>

  <!-- Toggle Forms Script -->
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
