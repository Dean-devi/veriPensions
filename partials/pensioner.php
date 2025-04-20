<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pension Management</title>

  <!-- Google Fonts (Roboto) -->
  <link 
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" 
    rel="stylesheet"
  />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/partials.css">

</head>
<body>
  <div class="pension-management-container">
    <h1 class=" mb-4">Pension Management</h1>

    <!-- Pension Overview -->
    <div class="pension-overview">
      <div class="pension-card">
        <h2 class="text-secondary">Pension Overview</h2>
        <div class="pension-details mb-3">
          <div class="detail">
            <strong>Pension Amount:</strong> $1200
          </div>
          <div class="detail">
            <strong>Pension Type:</strong> Monthly
          </div>
          <div class="detail">
            <strong>Status:</strong> <span class="text-success">Active</span>
          </div>
          <div class="detail">
            <strong>Last Verification Date:</strong> 2025-01-10
          </div>
        </div>
        <button class="btn btn-primary" id="edit-pension">Edit Pension</button>
      </div>
    </div>

    <!-- Pension History Table -->
    <div class="pension-history">
      <h2 class="text-secondary">Pension History</h2>
      <div class="history-actions">
        <input 
          type="text" 
          id="pension-history-search" 
          class="form-control w-auto" 
          placeholder="Search by date or amount"
        />
        <select id="status-filter" class="form-select w-auto">
          <option value="">Status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="pension-history-table">
          <thead class="table-light">
            <tr>
              <th>Date</th>
              <th>Amount</th>
              <th>Reason for Change</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample data rows -->
            <tr>
              <td>2025-01-01</td>
              <td>$1000</td>
              <td>Amount Increased</td>
              <td>
                <button class="btn btn-sm btn-outline-primary">Edit</button>
              </td>
            </tr>
            <tr>
              <td>2025-01-10</td>
              <td>$1200</td>
              <td>Status Changed</td>
              <td>
                <button class="btn btn-sm btn-outline-primary">Edit</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add/Edit Pension Modal -->
    <div id="edit-pension-modal" class="modal">
      <div class="modal-content">
        <span class="close-btn" id="close-modal">&times;</span>
        <h2>Edit Pension</h2>
        <form id="edit-pension-form" class="mt-3">
          <div class="mb-3">
            <label for="pension-amount" class="form-label">Amount:</label>
            <input type="number" id="pension-amount" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="pension-type" class="form-label">Pension Type:</label>
            <select id="pension-type" class="form-select" required>
              <option value="monthly">Monthly</option>
              <option value="quarterly">Quarterly</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="pension-status" class="form-label">Status:</label>
            <select id="pension-status" class="form-select" required>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success w-100">Save Changes</button>
        </form>
      </div>
    </div>
  </div>

  <script src="../js/pension.js"></script>
</body>
</html>
