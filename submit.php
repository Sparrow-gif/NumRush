<?php
$host = "sql206.infinityfree.com";
$user = "if0_38706128";
$pass = "Somnath333"; // Replace with your actual password
$db   = "if0_38706128_claimcoin";

// Connect
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['message'];

// Set IST Timezone
date_default_timezone_set('Asia/Kolkata');
$created_at = date("Y-m-d H:i:s");

// Insert data
$sql = "INSERT INTO contact_form (name, email, message, created_at) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $message, $created_at);

if ($stmt->execute()) {
    header("Location: contact.php?success=1");
} else {
    header("Location: contact.php?success=0");
}

$stmt->close();
$conn->close();
?>
