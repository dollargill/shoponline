<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$xmlFilePath = '../../data/customer.xml';
$xml = new DOMDocument();
if (!$xml->load($xmlFilePath)) {
    die("Failed to load XML.");
}

$xpath = new DOMXPath($xml);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);

$query = sprintf("/customers/customer[email='%s' and dob='%s']", $email, $dob);
$result = $xpath->query($query);

if ($result->length > 0) {
    $_SESSION['email'] = $email; // Store email in session for use in the next step
    header('Location: reset_password.php'); // Redirect to reset password page
    exit;
} else {
    // Consider redirecting to an error page or re-displaying the form with an error message
    die('Verification failed. Please check your credentials.');
}
?>
