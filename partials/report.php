<?php
session_start();
if (!isset($_SESSION['user_email']) || !isset($_SESSION['fullname'])) {
    header("Location: frontend/login.php");
    exit;
}
require_once '../backend/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Senior Citizen Management</title>

  <!-- Google Fonts (Roboto) -->
  <link 
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" 
    rel="stylesheet"
  />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/partials.css">

</head>
<body>
  <div class="management-container">
    <h1 class=" mb-4">Report Records Management</h1>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
      <input 
        type="text" 
        id="search-bar" 
        class="form-control w-auto" 
        placeholder="Search by Name or ID"
      />
      <div class="filter-options">
        <!-- status -->
        <select id="status" class="form-select">
          <option value="">Status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
          <option value="deceased">Deceased</option>
        </select>
        <!-- barangay -->
        <select id="brgy" class="form-select">
          <option value="">Barangay</option>
          <option value="Andal Aliño">Andal Aliño</option>
          <option value="Bagong Sikat">Bagong Sikat</option>
          <option value="Bagong Silang">Bagong Silang</option>
          <option value="Bacal I">Bacal I</option>
          <option value="Bacal II">Bacal II</option>
          <option value="Bacal III">Bacal III</option>
          <option value="Baluga">Baluga</option>
          <option value="Bantug">Bantug</option>
          <option value="Bantug Hacienda">Bantug Hacienda</option>
          <option value="Basang Hamog">Basang Hamog</option>
          <option value="Bugtong na Buli">Bugtong na Buli</option>
          <option value="Bulac">Bulac</option>
          <option value="Burnay">Burnay</option>
          <option value="Calipahan">Calipahan</option>
          <option value="Campos">Campos</option>
          <option value="Casulucan Este">Casulucan Este</option>
          <option value="Collado">Collado</option>
          <option value="Dimasalang Norte">Dimasalang Norte</option>
          <option value="Dimasalang Sur">Dimasalang Sur</option>
          <option value="Dinarayat">Dinarayat</option>
          <option value="Esguerra District">Esguerra District</option>
          <option value="Gulod">Gulod</option>
          <option value="Homestead I">Homestead I</option>
          <option value="Homestead II">Homestead II</option>
          <option value="Cabubulaunan">Cabubulaunan</option>
          <option value="Caaniplahan">Caaniplahan</option>
          <option value="Caputican">Caputican</option>
          <option value="Kinalanguyan">Kinalanguyan</option>
          <option value="La Torre">La Torre</option>
          <option value="Lomboy">Lomboy</option>
          <option value="Mabuhay">Mabuhay</option>
          <option value="Maestrang Kikay">Maestrang Kikay</option>
          <option value="Mamandil">Mamandil</option>
          <option value="Marcos District">Marcos District</option>
          <option value="Matias District">Matias District</option>
          <option value="Matingkis">Matingkis</option>
          <option value="Minabuyoc">Minabuyoc</option>
          <option value="Pag-asa District">Pag-asa District</option>
          <option value="Paludpod">Paludpod</option>
          <option value="Pantoc Bulac">Pantoc Bulac</option>
          <option value="Pinagpanaan">Pinagpanaan</option>
          <option value="Poblacion Sur">Poblacion Sur</option>
          <option value="Pula">Pula</option>
          <option value="Pulong San Miguel">Pulong San Miguel</option>
          <option value="Sampaloc">Sampaloc</option>
          <option value="San Miguel na Munti">San Miguel na Munti</option>
          <option value="San Pascual">San Pascual</option>
          <option value="San Ricardo">San Ricardo</option>
          <option value="Sibul">Sibul</option>
          <option value="Sicsican Matanda">Sicsican Matanda</option>
          <option value="Tabacao">Tabacao</option>
          <option value="Tagaytay">Tagaytay</option>
          <option value="Valle">Valle</option>
    </select>

      </div>
    </div>

    <!-- Action Buttons Section -->
    <div class="mb-3">
      <button class="btn btn-primary me-2" id="add-senior">Add Senior Citizen</button>
      <button class="btn btn-secondary" id="bulk-update">Bulk Update Status</button>
    </div>

    <!-- Data Table Section -->
    <div class="table-section">
    <table id="claimant-Table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Barangay</th>
                <th>Relationship to Pensioner</th>
                <th>Contact</th>
                <th>Approved By</th>
                <th>Action</th>
            </tr>
        </thead>
  
        <tbody id="claimantTable">
            <?php 
            $sqlQuery = "SELECT * FROM claimant";
            $result = $conn->query($sqlQuery);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['']}</td><td>{$row['']}</td><td>{$row['']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No Claimant Found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>

    <!-- Pagination Section -->
    <div class="pagination">
      <button class="btn btn-outline-primary me-2">Previous</button>
      <button class="btn btn-outline-primary">Next</button>
    </div>
  </div>

  <script src="../js/senior.js"></script>
</body>
</html>
