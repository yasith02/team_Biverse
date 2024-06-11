<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eterna_care";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["slip"])) {
    $location = $_POST["location"];
    $bank_name = $_POST["bank_name"];
    $bank_location = $_POST["bank_location"];
    $account_number = $_POST["account_number"];
    $slip = file_get_contents($_FILES["slip"]["tmp_name"]);
    
    $stmt = $conn->prepare("INSERT INTO payment_details (location, bank_name, bank_location, account_number, slip) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $location, $bank_name, $bank_location, $account_number, $slip);
    
    if ($stmt->execute()) {
        echo "Payment details and slip uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>