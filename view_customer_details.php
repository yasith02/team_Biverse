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
$sql = "SELECT name, age, email, telenumber FROM customer_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer Details</title>
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
        <h2>Customer Details</h2>
        <div class="table-container">
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Tele Number</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["telenumber"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>
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
