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
    <link rel="stylesheet" href="5ph.css">
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
    <div class="button-container">
        <a href="view_records.php" class="previous-btn">
            <span class="button-text">Previous</span>
        </a>
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


