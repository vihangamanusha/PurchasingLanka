<?php
// payment.php

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['paymentMethod'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

$paymentMethod = $input['paymentMethod'];

$cardholder = $input['cardholder'] ?? null;
$cardnumber = $input['cardnumber'] ?? null;
$expiry = $input['expiry'] ?? null;
$cvv = $input['cvv'] ?? null;

// Database credentials
$host = 'localhost';
$dbname = 'purchasinglanka';
$user = 'root';
$pass = '12345';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO payments (method, cardholder, cardnumber, expiry, cvv) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$paymentMethod, $cardholder, $cardnumber, $expiry, $cvv]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
