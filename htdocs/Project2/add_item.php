<?php

$xmlFilePath = '../../data/auction.xml';
$xml = new DOMDocument();
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load($xmlFilePath);

$xpath = new DOMXPath($xml);
$items = $xml->getElementsByTagName('items')->item(0);

// Assume customerID is retrieved from session or authentication context
$customerID = 1; // Placeholder for demonstration

$itemID = $xpath->evaluate('count(/auction/items/item)') + 1;
$itemName = $_POST['itemName'];
$category = $_POST['category'];
$description = $_POST['description'];
$startingPrice = $_POST['startingPrice'];
$reservePrice = $_POST['reservePrice'];
$buyItNowPrice = $_POST['buyItNowPrice'];
$duration = date('Y-m-d\TH:i:s', strtotime('+7 days')); // 7 days from now

$item = $xml->createElement('item');
$items->appendChild($item);

$item->appendChild($xml->createElement('customerID', $customerID));
$item->appendChild($xml->createElement('itemID', $itemID));
$item->appendChild($xml->createElement('itemName', $itemName));
$item->appendChild($xml->createElement('category', $category));
$item->appendChild($xml->createElement('description', $description));
$item->appendChild($xml->createElement('startingPrice', $startingPrice));
$item->appendChild($xml->createElement('reservePrice', $reservePrice));
$item->appendChild($xml->createElement('buyItNowPrice', $buyItNowPrice));
$item->appendChild($xml->createElement('bidPrice', $startingPrice)); // Initial bid price equals starting price
$item->appendChild($xml->createElement('duration', $duration));
$item->appendChild($xml->createElement('status', 'in progress'));

$xml->save($xmlFilePath);

echo "Item successfully listed for auction.";
?>
