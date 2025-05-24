<?php
// delivery.php

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['fullname'], $input['phone'], $input['address'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

$fullname = trim($input['fullname']);
$phone = trim($input['phone']);
$address = trim($input['address']);

if ($fullname === '' || $phone === '' || $address === '') {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

// Database credentials
$host = 'localhost';
$dbname = 'purchasinglanka';
$user = 'root';
$pass = '12345';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO deliveries (fullname, phone, address) VALUES (?, ?, ?)");
    $stmt->execute([$fullname, $phone, $address]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
