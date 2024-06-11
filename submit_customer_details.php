<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eterna_care"; // Ensure this is your correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $telenumber = $_POST['telenumber'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO customer_details (name, age, email, telenumber) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $age, $email, $telenumber);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
