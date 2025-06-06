<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin/Staff Profile Management</title>

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
  <div class="profile-management-container">
    <h1 class=" mb-4">Admin/Staff Profile Management</h1>

    <!-- Profile Overview -->
    <div class="profile-overview mb-4">
      <div class="profile-card">
        <img 
          src="img/logo.jpg" 
          alt="Profile Picture" 
          class="profile-pic"
        />
        <div class="profile-info">
          <h2>Admin Name</h2>
          <p>Role: <span class="role fw-bold">Admin</span></p>
          <p>Contact: admin@example.com</p>
          <button id="edit-profile" class="btn btn-primary">Edit Profile</button>
        </div>
      </div>
    </div>

    <!-- Activity Log -->
    <div class="activity-log">
      <h2 class="text-secondary">Recent Activities</h2>
      <ul class="list-group mt-2">
        <li class="list-group-item">Sent SMS to John Doe</li>
        <li class="list-group-item">Initiated Biometric Verification for Jane Smith</li>
        <li class="list-group-item">Updated Pension Information for Susan Lee</li>
      </ul>
    </div>

    <!-- Permissions & Roles -->
    <div class="permissions-roles mt-4">
      <h2 class="text-secondary">Staff Members & Roles</h2>
      <div class="table-responsive mt-2">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>Staff Name</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>Staff</td>
              <td>
                <button class="btn btn-sm btn-outline-primary" id="edit-permissions">
                  Edit Permissions
                </button>
              </td>
            </tr>
            <tr>
              <td>Jane Smit</td>
              <td>Staff</td>
              <td>
                <button class="btn btn-sm btn-outline-primary" id="edit-permissions">
                  Edit Permissions
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div id="edit-profile-modal" class="modal">
    <div class="modal-content">
      <span class="close-btn" id="close-modal">&times;</span>
      <h2>Edit Profile</h2>
      <form id="edit-profile-form" class="mt-3">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" id="name" class="form-control" value="Admin Name" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" id="email" class="form-control" value="admin@example.com" required />
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role:</label>
          <select id="role" class="form-select" required>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
          </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Save Changes</button>
      </form>
    </div>
  </div>

  <script src="../js/user.js"></script>
</body>
</html>
