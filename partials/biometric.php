<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Biometric Verification</title>

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
  <div class="verification-container">
    <h1 class=" mb-4">Biometric Verification</h1>

    <!-- Initiate Verification Button -->
    <div class="initiate-verification">
      <button class="btn btn-primary" id="initiate-verification">Initiate Verification</button>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
      <input 
        type="text" 
        id="verification-search" 
        class="form-control w-auto" 
        placeholder="Search by Name or ID..."
      />
      <input type="date" id="start-date" class="form-control w-auto" />
      <input type="date" id="end-date" class="form-control w-auto" />
      <select id="verification-result" class="form-select w-auto">
        <option value="">Result</option>
        <option value="success">Success</option>
        <option value="failure">Failure</option>
      </select>
    </div>

    <!-- Verification Logs Table -->
    <div class="log-section">
      <table class="table table-bordered table-hover" id="verification-logs-table">
        <thead class="table-light">
          <tr>
            <th>Senior Name</th>
            <th>Verification Date</th>
            <th>Result</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Sample data rows -->
          <tr>
            <td><a href="#" class="text-decoration-none">John Doe</a></td>
            <td>2025-01-10</td>
            <td class="text-success">Success</td>
            <td>
              <button class="btn btn-sm btn-outline-warning">Reverify</button>
            </td>
          </tr>
          <tr>
            <td><a href="#" class="text-decoration-none">Jane Smith</a></td>
            <td>2025-01-12</td>
            <td class="text-danger">Failure</td>
            <td>
              <button class="btn btn-sm btn-outline-warning">Reverify</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination Section -->
    <div class="pagination">
      <button class="btn btn-outline-primary me-2">Previous</button>
      <button class="btn btn-outline-primary">Next</button>
    </div>
  </div>

  <script src="js/biometric.js"></script>
</body>
</html>
