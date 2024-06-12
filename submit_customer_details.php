<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eterna_care";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve session data
    $location = $_SESSION['location'];
    $cdate = $_SESSION['cdate'];
    $time = $_SESSION['time'];
    $death_name = $_SESSION['name'];
    $death_age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $nic = $_SESSION['nic'];
    $certificate = $_SESSION['certificate'];
    
    // Get customer details
    $customer_name = $_POST['name'];
    $customer_age = $_POST['age'];
    $email = $_POST['email'];
    $telenumber = $_POST['telenumber'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO records (location, cdate, time, death_name, death_age, gender, nic, certificate, customer_name, customer_age, email, telenumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssssss", $location, $cdate, $time, $death_name, $death_age, $gender, $nic, $certificate, $customer_name, $customer_age, $email, $telenumber);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Clear session data
    session_unset();
    session_destroy();
}
?>


