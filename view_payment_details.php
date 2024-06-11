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

// Fetch records from the database
$sql = "SELECT location, bank_name, bank_location, account_number, slip FROM payment_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payment Details</title>
    <link rel="stylesheet" href="4php.css">
</head>
<body>
    <nav class="navbar">
        <img src="logo.png" alt="Eterna Care Logo" class="logo">
        <span class="brand-name">Eterna Care</span>
        <div class="menu-items">
            <a href="#">Home</a>
            <a href="#">Contact</a>
            <a href="#">About Us</a>
        </div>
    </nav>
    <div class="container">
        <h2>Payment Details</h2>
        <table border="1">
            <tr>
                <th>Location</th>
                <th>Bank Name</th>
                <th>Bank Location</th>
                <th>Account Number</th>
                <th>Slip</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["bank_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["bank_location"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["account_number"]) . "</td>";
                    echo "<td>";
                    if (!empty($row['slip'])) {
                        $imgData = base64_encode($row['slip']);
                        $src = 'data:image/jpeg;base64,' . $imgData;
                        echo '<img src="' . $src . '" width="100"/>';
                    } else {
                        echo 'No slip';
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>

