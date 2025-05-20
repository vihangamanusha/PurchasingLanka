<?php
session_start();

// DB config
$host = 'localhost';
$db   = 'purchasinglanka';
$user = 'root';
$pass = '801@Vihanga';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Validate
if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Please fill in all fields.";
    header("Location: login.php");
    exit();
}

// Query user
$stmt = $conn->prepare("SELECT id, fname, lname, password FROM users WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Login success
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $user['fname'] . ' ' . $user['lname'];

        header("Location: homepage.html"); // Redirect to homepage
        exit();
    } else {
        $_SESSION['error'] = "Invalid password.";
    }
} else {
    $_SESSION['error'] = "No user found with that email.";
}

header("Location: login.php");
exit();
?>
