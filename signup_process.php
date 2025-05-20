<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB config
$host = 'localhost';
$db   = 'purchasinglanka';
$user = 'root';
$pass = '801@Vihanga';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed: " . $conn->connect_error;
    header("Location: signup.php");
    exit();
}

// Sanitize and validate input
$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$cpassword = $_POST['cpassword'] ?? '';

// Validation
if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($cpassword)) {
    $_SESSION['error'] = "Please fill in all fields.";
    header("Location: signup.php");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Invalid email format.";
    header("Location: signup.php");
    exit();
}

if ($password !== $cpassword) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: signup.php");
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user
$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    $_SESSION['error'] = "Database error: " . $conn->error;
    header("Location: signup.php");
    exit();
}

$stmt->bind_param('ssss', $fname, $lname, $email, $hashed_password);

if ($stmt->execute()) {
    // ✅ Auto-login: Set session variables
    $_SESSION['user_id'] = $stmt->insert_id;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $fname . ' ' . $lname;

    // ✅ Redirect to dashboard or homepage
    header("Location: homepage.html"); // Change to your actual home/dashboard page
    exit();
} else {
    if ($conn->errno === 1062) {
        $_SESSION['error'] = "Email is already registered.";
    } else {
        $_SESSION['error'] = "Database error: " . $conn->error;
    }
    header("Location: signup.php");
    exit();
}

$stmt->close();
$conn->close();
