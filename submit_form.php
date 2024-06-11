<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eterna_care"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $cdate = $_POST['cdate'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $nic = $_POST['nic'];
    $certificate = addslashes(file_get_contents($_FILES['certificate']['tmp_name']));

    $sql = "INSERT INTO form_entries (location, cdate, time, name, age, gender, nic, certificate) 
            VALUES ('$location', '$cdate', '$time', '$name', $age, '$gender', '$nic', '$certificate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
