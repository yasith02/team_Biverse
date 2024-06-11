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

// Fetch records from the database
$sql = "SELECT location, cdate, time, name, age, gender, nic, certificate FROM form_entries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="3php.css">
</head>
<body>
    <nav class="navbar">
        <img src="logo.png" alt="Eterna Care Logo" class="logo">
        <span class="brand-name">Eterna Care</span>
        <div class="menu-items">
            <a href="index.html">Home</a>
            <a href="#">Contact</a>
            <a href="#">About Us</a>
        </div>
    </nav>
    <div class="container">
        <h2>Records</h2>
        <table border="1">
            <tr>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>NIC</th>
                <th>Verify Certificate</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["cdate"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["time"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["age"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["nic"]) . "</td>";
                    echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['certificate']).'" /></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>

