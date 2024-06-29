<?php
// Start session if not already started
if(session_id() == '' || !isset($_SESSION)){
    session_start();
}

// Include database configuration
include 'config.php';

// Retrieve form data
$username = $_POST["username"];
$password = $_POST["pwd"];

// Query to fetch user details
$stmt = $mysqli->prepare("SELECT id, email, password, fname, type FROM users WHERE email = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Password is correct, set session variables
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $user['type'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['fname'] = $user['fname'];
        // Redirect to index.php after successful login
        header("location: index.php");
        exit();
    } else {
        // Password is incorrect, redirect with error message
        redirectWithError("Invalid password! Redirecting...");
    }
} else {
    // No user found with the given email, redirect with error message
    redirectWithError("User not found! Redirecting...");
}

$stmt->close();

function redirectWithError($message) {
    echo "<h1>$message</h1>";
    header("Refresh: 3; url=index.php");
    exit();
}
?>
