<?php
$servername = "localhost";  // Change if necessary
$username = "root";         // Change if necessary
$password = "";             // Change if necessary
$dbname = "veripension_db";  // Change to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


