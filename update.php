<?php
include 'config.php';

if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["username"])) {
    echo '<h1>Invalid Login! Redirecting...</h1>';
    header("Refresh: 3; url=login.php");
    exit();
}

$fname = !empty($_POST['fname']) ? $_POST['fname'] : NULL;
$lname = !empty($_POST['lname']) ? $_POST['lname'] : NULL;
$address = !empty($_POST['address']) ? $_POST['address'] : NULL;
$city = !empty($_POST['city']) ? $_POST['city'] : NULL;
$pin = !empty($_POST['pin']) ? (int)$_POST['pin'] : NULL;
$email = !empty($_POST['email']) ? $_POST['email'] : NULL;
$pwd = !empty($_POST['pwd']) ? password_hash($_POST['pwd'], PASSWORD_DEFAULT) : NULL;

// Build the SQL statement dynamically
$sql = "UPDATE users SET ";
$params = [];
$types = "";

// Check each field and add to the query if it is set
if ($fname !== NULL) {
    $sql .= "fname = ?, ";
    $params[] = $fname;
    $types .= "s";
}
if ($lname !== NULL) {
    $sql .= "lname = ?, ";
    $params[] = $lname;
    $types .= "s";
}
if ($address !== NULL) {
    $sql .= "address = ?, ";
    $params[] = $address;
    $types .= "s";
}
if ($city !== NULL) {
    $sql .= "city = ?, ";
    $params[] = $city;
    $types .= "s";
}
if ($pin !== NULL) {
    $sql .= "pin = ?, ";
    $params[] = $pin;
    $types .= "i";
}
if ($email !== NULL) {
    $sql .= "email = ?, ";
    $params[] = $email;
    $types .= "s";
}
if ($pwd !== NULL) {
    $sql .= "password = ?, ";
    $params[] = $pwd;
    $types .= "s";
}

// Check if at least one field is set
if (empty($params)) {
  echo '<script>
  alert("No fields to update. Please enter at least one field to update.");
  window.location.href = "account.php";
</script>';
exit();
}

// Remove the trailing comma and space
$sql = rtrim($sql, ", ");

// Add the WHERE clause
$sql .= " WHERE id = ?";
$params[] = $_SESSION['id'];
$types .= "i";

// Prepare and bind the statement
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die('Error preparing the statement: ' . $mysqli->error);
}

$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    // Use JavaScript to show an alert and redirect
    echo '<script>
            alert("Account updated successfully");
            window.location.href = "account.php";
          </script>';
    exit(); // Ensure the script stops executing after redirection
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
?>
