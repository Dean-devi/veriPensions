<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SMS Notification Management</title>

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
  <div class="sms-notification-container">
    <h1 class=" mb-4">SMS Notification Management</h1>

    <!-- Send SMS Button -->
    <button class="btn btn-primary mb-3" id="send-sms">Send SMS</button>

    <!-- SMS Log Table -->
    <div class="sms-log-table">
      <h2 class="text-secondary">SMS Log</h2>
      <div class="log-actions">
        <input 
          type="text" 
          id="sms-search" 
          class="form-control w-auto" 
          placeholder="Search by name or date"
        />
        <select id="status-filter" class="form-select w-auto">
          <option value="">Status</option>
          <option value="sent">Sent</option>
          <option value="failed">Failed</option>
        </select>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="sms-log-table">
          <thead class="table-light">
            <tr>
              <th>Senior Name</th>
              <th>Message Content</th>
              <th>Sent Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample data rows -->
            <tr>
              <td>John Doe</td>
              <td>This is a test message content.</td>
              <td>2025-02-10</td>
              <td><span class="status-sent">Sent</span></td>
            </tr>
            <tr>
              <td>Jane Smith</td>
              <td>Reminder: Your pension is ready.</td>
              <td>2025-02-12</td>
              <td><span class="status-failed">Failed</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Send SMS Modal -->
    <div id="send-sms-modal" class="modal">
      <div class="modal-content">
        <span class="close-btn" id="close-modal">&times;</span>
        <h2>Send SMS</h2>
        <form id="send-sms-form" class="mt-3">
          <div class="mb-3">
            <label for="recipient" class="form-label">Recipient:</label>
            <select id="recipient" class="form-select" multiple required>
              <!-- Sample senior citizens -->
              <option value="john">John Doe</option>
              <option value="jane">Jane Smith</option>
              <option value="susan">Susan Lee</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-content" class="form-label">Message Content:</label>
            <textarea 
              id="message-content" 
              class="form-control" 
              required 
              placeholder="Enter message here"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-success w-100">Send SMS</button>
        </form>
      </div>
    </div>
  </div>

  <script src="../js/sms.js"></script>
</body>
</html>
