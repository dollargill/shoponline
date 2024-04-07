<?php
header('Content-Type: text/plain');

$xmlFilePath = '../../data/customer.xml'; 
$xml = new DOMDocument();
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
if (!$xml->load($xmlFilePath)) {
    echo "Failed to load XML";
    exit;
}

$xpath = new DOMXPath($xml);

$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);

// Email uniqueness check
$query = sprintf("/customers/customer[email='%s']", $email);
$result = $xpath->query($query);
if ($result->length > 0) {
    echo "Email already registered.";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$customer = $xml->createElement("customer");
$customers = $xml->getElementsByTagName("customers")->item(0);
$customers->appendChild($customer);

$id = $xml->createElement("id", $xpath->query('/customers/customer')->length + 1);
$customer->appendChild($id);

$firstNameElement = $xml->createElement("firstName", $firstName);
$customer->appendChild($firstNameElement);

$surnameElement = $xml->createElement("surname", $surname);
$customer->appendChild($surnameElement);

$emailElement = $xml->createElement("email", $email);
$customer->appendChild($emailElement);

$passwordElement = $xml->createElement("password", $hashedPassword);
$customer->appendChild($passwordElement);

$dobElement = $xml->createElement("dob", $dob);
$customer->appendChild($dobElement);

$xml->save($xmlFilePath);

echo "Registration successful!";
?>
