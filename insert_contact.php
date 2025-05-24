<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "12345"; // Update this if your MySQL has a password
$database = "purchasinglanka";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// reCAPTCHA secret key (this is Google's public test key — replace with your real one for production)
$secretKey = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // CAPTCHA validation
    $captcha = $_POST['g-recaptcha-response'];
    if (!$captcha) {
        echo "Captcha not completed.";
        exit;
    }

    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
    $responseData = json_decode($verifyResponse);
    if (!$responseData->success) {
        echo "Captcha verification failed.";
        exit;
    }

    // Retrieve and sanitize form inputs
    $category = $_POST['category'];
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // File upload handling
    $attachmentPath = "";
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = basename($_FILES['attachment']['name']);
        $fileSize = $_FILES['attachment']['size'];

        if ($fileSize > 5 * 1024 * 1024) {
            echo "File too large. Max 5MB.";
            exit;
        }

        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $newFileName = uniqid() . "_" . $fileName;
        $destPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $attachmentPath = $destPath;
        } else {
            echo "File upload failed.";
            exit;
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO contact_submissions (category, first_name, last_name, phone, email, message, attachment_path, submitted_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $category, $firstName, $lastName, $phone, $email, $message, $attachmentPath);

    if ($stmt->execute()) {
        // Redirect to contact_us.php with success message
        header("Location: contact_us.html?success=true");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
