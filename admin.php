<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>

  <!-- Google Fonts: Roboto -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link 
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" 
    rel="stylesheet"
  />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />

  <!-- Font Awesome Icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <!-- Optional Custom Styles -->
  <link rel="stylesheet" href="css/styles.css" />

  <style>
    /* Layout: sidebar + main content */
    body {
      font-family: "Roboto", sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .sidebar {
      width: 250px;
      background-color: #fff;
      min-height: 100vh;
      border-right: 1px solid #ddd;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 1rem;
    }
    .sidebar .logo {
      text-align: center;
      margin-bottom: 1rem;
    }
    .sidebar .logo img {
      width: 120px;
      height: auto;
    }
    .nav-item {
      list-style: none;
    }
    .nav-link {
      display: flex;
      align-items: center;
      color: #333;
      text-decoration: none;
      padding: 0.75rem 1rem;
      transition: background-color 0.2s, color 0.2s;
      border-radius: 4px;
      margin: 0.25rem 0;
    }
    .nav-link:hover {
      background-color: #0d6efd;
      color: #fff !important;
      text-decoration: none;
    }
    .nav-link i {
      margin-right: 0.5rem;
    }
    .main-content {
      margin-left: 250px;
      padding: 0 1rem 1rem;
    }
    /* Top Header (Breadcrumb + Profile & Logout) */
    .top-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #fff;
      border-bottom: 1px solid #ddd;
      padding: 1rem;
      position: sticky;
      top: 0;
      z-index: 999;
    }
    .breadcrumb {
      font-size: 0.9rem;
      color: #666;
      margin: 0;
    }
    .profile-actions {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
    }
    .profile-info {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.5rem;
    }
    .profile-info img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
    .logout-btn {
      border: none;
      background-color: #dc3545;
      color: #fff;
      padding: 0.4rem 0.8rem;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.9rem;
    }
    .logout-btn:hover {
      background-color: #c82333;
    }
    .page-content {
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo">
      <img src="img/logo.jpg" alt="Logo" />
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link" data-page="partials/dashboard.html">
          <i class="fas fa-tachometer-alt"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-page="partials/senior.html">
          <i class="fas fa-users"></i>
          Senior Citizens
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-page="partials/biometric.html">
          <i class="fas fa-fingerprint"></i>
          Biometric Verification
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-page="partials/pension.html">
          <i class="fas fa-file-invoice-dollar"></i>
          Pension Records
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-page="partials/sms.html">
          <i class="fas fa-sms"></i>
          SMS Notifications
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-page="partials/user.html">
          <i class="fas fa-user-cog"></i>
          Admin Profile
        </a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Top Header (Breadcrumb + Profile & Logout) -->
    <div class="top-header">
      <h5 class="breadcrumb" id="breadcrumb-text">Dashboard</h5>
      <div class="profile-actions">
        <div class="profile-info">
          <img src="img/logo.jpg" alt="Profile" />
          <span>Admin Name</span>
        </div>
        <button class="logout-btn">
          <i class="fas fa-sign-out-alt"></i> Logout
        </button>
      </div>
    </div>

    <!-- Dynamic Page Content -->
    <div class="page-content" id="page-content">
      <!-- The default (Dashboard) will be loaded here by script.js on page load -->
    </div>
  </div>

  <!-- Script -->
  <script src="js/admin.js"></script>
</body>
</html>