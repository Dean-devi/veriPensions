<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>

  <!-- Google Fonts (Roboto) -->
  <link 
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" 
    rel="stylesheet"
  />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="../css/dashboard.css">

  <!-- Font Awesome Icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <!-- Chart.js for Graphs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
    }
    .dashboard-container {
      padding: 2rem;
    }
    .metrics-overview {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .metric-card {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 0.5rem;
      padding: 1rem;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .metric-card .icon {
      margin-bottom: 0.5rem;
    }
    .metric-card h3 {
      color: #0d6efd;
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
    }
    .metric-card p {
      font-size: 1.25rem;
      font-weight: bold;
      margin: 0;
    }
    .graph-section {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }
    .charts {
      flex: 1;
      min-width: 300px;
    }
    .quick-actions {
      min-width: 300px;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .quick-action .action-btn {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <!-- Top Section (Metrics Overview) -->
    <div class="metrics-overview">
      <div class="metric-card">
        <div class="icon">
          <i class="fas fa-users fa-2x text-primary"></i>
        </div>
        <h3>Senior Citizens Enrolled</h3>
        <p id="enrolled-count">3100</p>
      </div>
      <div class="metric-card">
        <div class="icon">
          <i class="fas fa-money-check-alt fa-2x text-success"></i>
        </div>
        <h3>Active Pensions</h3>
        <p id="active-pensions">2000</p>
      </div>
      <div class="metric-card">
        <div class="icon">
          <i class="fas fa-fingerprint fa-2x text-warning"></i>
        </div>
        <h3>Pending Biometric Verifications</h3>
        <p id="pending-verifications">120</p>
      </div>
      <div class="metric-card">
        <div class="icon">
          <i class="fas fa-sms fa-2x text-info"></i>
        </div>
        <h3>SMS Notifications Sent</h3>
        <p id="sms-sent">5000</p>
      </div>
    </div>

    <!-- Graph Section -->
    <div class="graph-section">
      <div class="charts">
        <!-- Pie Chart for Pension Breakdown -->
        <canvas id="pensionPieChart"></canvas>
        <!-- Line Chart for Biometric Verifications -->
        <canvas id="verificationLineChart" class="mt-4"></canvas>
        <!-- Line Chart for Pension Claims -->
        <canvas id="pensionClaimedChart" class="mt-4"></canvas>
      </div>
      <!-- Quick Actions -->
      <div class="quick-actions">
        <div class="quick-action">
          <button class="btn btn-primary action-btn" id="send-sms">
            Send SMS
          </button>
        </div>
        <div class="quick-action">
          <button class="btn btn-secondary action-btn" id="start-verification">
            Start Verification
          </button>
        </div>
        <div class="quick-action">
          <button class="btn btn-success action-btn" id="update-pension-status">
            Update Pension Status
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/dashboard.js"></script>
</body>
</html>