<?php
include 'config.php';

// Check if all form fields are set
if (!isset($_POST["fname"], $_POST["lname"], $_POST["address"], $_POST["city"], $_POST["pin"], $_POST["email"], $_POST["pwd"])) {
    die("Error: All fields are required.");
}

// Retrieve form data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

// Hash password for security
$hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

// Prepare and execute SQL statement with prepared statement
$stmt = $mysqli->prepare("INSERT INTO users (fname, lname, address, city, pin, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die('Error: ' . $mysqli->error);
}

$stmt->bind_param("ssssiss", $fname, $lname, $address, $city, $pin, $email, $hashed_password);

if ($stmt->execute()) {
    header("location: login.php");
    exit();
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();

// Redirect to login page (uncomment for production)
// header("location: login.php");
// exit();
?>
