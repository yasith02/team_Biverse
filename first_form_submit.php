<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store first form data in session variables
    $_SESSION['location'] = $_POST['location'];
    $_SESSION['cdate'] = $_POST['cdate'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['nic'] = $_POST['nic'];

    // Handle file upload
    if (isset($_FILES['certificate']) && $_FILES['certificate']['error'] == 0) {
        $certificate = file_get_contents($_FILES['certificate']['tmp_name']);
        $_SESSION['certificate'] = $certificate;
    } else {
        $_SESSION['certificate'] = NULL;
    }

    // Redirect to the second form
    header("Location: 3.html");
    exit;
}
?>
