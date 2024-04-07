<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if the session is not set
    header('Location: login.htm');
    exit();
}

header('Content-Type: text/html; charset=utf-8');
$xmlFilePath = '../../data/customer.xml';
$newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);

if (!$newPassword) {
    echo "Password is required.";
    exit();
}

$xml = new DOMDocument();
if (!$xml->load($xmlFilePath)) {
    die("Failed to load XML.");
}

$xpath = new DOMXPath($xml);
$email = $_SESSION['email']; // Email from the session

$query = sprintf("/customers/customer[email='%s']", $email);
$customers = $xpath->query($query);

if ($customers->length > 0) {
    $customer = $customers->item(0);
    $passwordNode = $customer->getElementsByTagName("password")->item(0);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Hash the new password
    $passwordNode->nodeValue = $hashedPassword; // Update the password with the hashed one

    $xml->save($xmlFilePath); // Save changes to the XML file
    // Success message and button are shown below in HTML
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Ensure the correct path to your style.css -->
</head>
<body>
    <header class="header-logo">
        <h1>Shop Online</h1>
        <p class="dim">the World's Luxury Marketplace. 💵</p>
    </header>
    <div class="container d-flex align-items-center" ">
        <div class="login-section text-center flex-grow-1">
            <h2>Password Reset Successful</h2>
            <p>Your password has been reset successfully.</p>
            <a href="login.htm" class="btn btn-primary" style="color:white">Login</a>
        </div>
        <div class="info-section flex-grow-1">
            <img class="store" src="images/resetsuccess.png" alt="Store" style="max-width: 100%; height: auto;"> <!-- Ensure the src path is correct -->
        </div>
    </div>
    <footer class="footer-logo text-center">
        <p>© 2024 Dollar Karan Preet Singh. All rights reserved.<br> COS80021-Web Application Development</p>
    </footer>
</body>
</html>
