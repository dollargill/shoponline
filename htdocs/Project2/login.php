<?php
header('Content-Type: text/plain');

$xmlFilePath = '../../data/customer.xml'; 
$xml = new DOMDocument();
if (!$xml->load($xmlFilePath)) {
    echo "fail to load XML";
    exit;
}

$email = $_POST['email'] ?? '';
$inputPassword = $_POST['password'] ?? '';

$xpath = new DOMXPath($xml);
$query = sprintf("/customers/customer[email='%s']", $email);
$customers = $xpath->query($query);

if ($customers->length > 0) {
    $customer = $customers->item(0); // Assuming email is unique, there should only be one match.
    $passwordElement = $customer->getElementsByTagName("password")->item(0);
    $hashedPassword = $passwordElement ? $passwordElement->nodeValue : '';

    // Now verify the input password against the hashed password.
    if (password_verify($inputPassword, $hashedPassword)) {
        echo "success";
    } else {
        echo "fail"; // Correct email, but wrong password.
    }
} else {
    echo "fail"; // Email not found.
}
?>
