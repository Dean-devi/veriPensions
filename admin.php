<?php
session_start();
if (!isset($_SESSION['user_email']) || !isset($_SESSION['fullname'])) {
    header("Location: frontend/login.php");
    exit;
}
require_once 'backend/db.php';

$user_email = htmlspecialchars($_SESSION['user_email']);
$fullname = htmlspecialchars($_SESSION['fullname']);
$userType = $_SESSION['userType']; // assuming this is set on login
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <link rel="stylesheet" href="css/admin.css"/>
  
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar text-center bg-light p-3">
  <div class="logo mb-4">
    <img src="img/logo4.png" alt="Logo" class="img-fluid" style="max-width: 120px;">
  </div>
  <ul class="nav flex-column text-start">
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/dashboard.html">
        <i class="fas fa-tachometer-alt me-2"></i><span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/pensioner.php">
        <i class="fas fa-users me-2"></i><span>Pensioners</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/claimant.php">
        <i class="fas fa-fingerprint me-2"></i><span>Claimants</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/payout.php">
        <i class="fas fa-file-invoice-dollar me-2"></i><span>Payout Records</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/biometric.php">
        <i class="fas fa-user-cog me-2"></i><span>Biometric Records</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/sms.php">
        <i class="fas fa-sms me-2"></i><span>SMS Notifications</span>
      </a>
    </li>
    <?php if ($userType !== 'subAdmin') : ?>
      <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center" data-page="partials/user.php">
          <i class="fas fa-user-shield me-2"></i><span>Admin Management</span>
        </a>
      </li>
    <?php endif; ?>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center" data-page="partials/report.php">
        <i class="fas fa-chart-bar me-2"></i><span>Report Records</span>
      </a>
    </li>
  </ul>
</div>


  <!-- Main Content -->
  <div class="main-content">
    <div class="top-header">
      <h5 class="m-0" id="breadcrumb-text">Dashboard</h5>
      <div class="user-info">
        <button class="theme-toggle" id="theme-toggle"><i class="fas fa-moon"></i></button>
        <img src="img/logo.jpg" alt="User">
        <div>
          <div><?= $fullname ?></div>
          <small><?= $user_email ?></small>
        </div>
        <form id="logoutForm" action="backend/logout.php" method="POST" class="ms-3">
          <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt me-1"></i> Logout
          </button>
        </form>

      </div>
    </div>

    <div class="page-content" id="page-content">
      <!-- Content loads here -->
    </div>
  </div>

  <script>
    // Dark/light mode toggle
    const toggleBtn = document.getElementById('theme-toggle');
    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('bg-dark');
      document.body.classList.toggle('text-white');
      const icon = toggleBtn.querySelector('i');
      icon.classList.toggle('fa-moon');
      icon.classList.toggle('fa-sun');
    });

    
  document.getElementById("logoutForm").addEventListener("submit", function (e) {
    const confirmLogout = confirm("Are you sure you want to logout?");
    if (!confirmLogout) {
      e.preventDefault(); // cancel logout
    }
  });


  </script>

  <!-- Your existing JS -->
  <script src="js/admin.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/biometric.js"></script>
  <script src="js/pension.js"></script>
  <script src="js/sms.js"></script>
  <script src="js/senior.js"></script>
</body>
</html>
