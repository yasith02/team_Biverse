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
$sql = "SELECT location, cdate, time, death_name, death_age, gender, nic, certificate, customer_name, customer_age, email, telenumber, created_at FROM records";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
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
        <h2>Records</h2>
        <table border="1">
            <tr>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
                <th>Death Name</th>
                <th>Death Age</th>
                <th>Gender</th>
                <th>NIC</th>
                <th>Certificate</th>
                <th>Customer Name</th>
                <th>Customer Age</th>
                <th>Email</th>
                <th>Telephone Number</th>
                <th>Created At</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["cdate"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["time"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["death_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["death_age"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["nic"]) . "</td>";
                    echo "<td>";
                    if (!empty($row['certificate'])) {
                        $imgData = base64_encode($row['certificate']);
                        $src = 'data:image/jpeg;base64,' . $imgData;
                        echo '<img src="' . $src . '" width="100"/>';
                    } else {
                        echo 'No certificate';
                    }
                    echo "</td>";
                    echo "<td>" . htmlspecialchars($row["customer_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["customer_age"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["telenumber"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <img src="gmail.png" alt="Email Icon" class="footer-icon">
                <p>srilankagov@gmail.com</p>
            </div>
            <div class="footer-section">
                <img src="facebook.png" alt="Facebook Icon" class="footer-icon">
                <p>https://facebook.com</p>
            </div>
            <div class="footer-section">
                <img src="phone.png" alt="Phone Icon" class="footer-icon">
                <p>+94 25-7778978</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright© 2024 Government of Sri Lanka. All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
