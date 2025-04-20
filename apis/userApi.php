<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

include "db.php";

// Sanitize function
function clean($conn, $input) {
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Registration
    $data = json_decode(file_get_contents("php://input"), true);
    $email = clean($conn, $data['email'] ?? '');
    $fullname = clean($conn, $data['fullname'] ?? '');
    $password = clean($conn, $data['password'] ?? '');
    $confirm = clean($conn, $data['confirmPassword'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format"]);
        exit;
    }

    if (strlen($password) < 6) {
        echo json_encode(["status" => "error", "message" => "Password must be at least 6 characters"]);
        exit;
    }

    if ($password !== $confirm) {
        echo json_encode(["status" => "error", "message" => "Passwords do not match"]);
        exit;
    }

    $check = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($check->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email already exists"]);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')");

    echo json_encode(["status" => "success", "message" => "Registration successful!"]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Login
    $email = clean($conn, $_GET['email'] ?? '');
    $password = clean($conn, $_GET['password'] ?? '');

    $query = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($query->num_rows === 1) {
        $user = $query->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['userID'] = $user['id'];
            echo json_encode(["status" => "success", "message" => "Login successful!"]);
            exit;
        }
    }
    echo json_encode(["status" => "error", "message" => "Incorrect email or password"]);
    exit;
}

echo json_encode(["status" => "error", "message" => "Invalid request method"]);
exit;
?>
