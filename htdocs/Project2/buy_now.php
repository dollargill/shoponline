<?php
// Assuming session_start() and user authentication are handled appropriately
$itemID = $_POST['itemID'];
$buyItNowPrice = $_POST['buyItNowPrice'];

$xmlFilePath = '../../data/auction.xml';
$xml = new DOMDocument();
$xml->load($xmlFilePath);
$xpath = new DOMXPath($xml);

$item = $xpath->query("/auction/items/item[itemID='$itemID']")->item(0);
$item->getElementsByTagName('bidPrice')->item(0)->nodeValue = $buyItNowPrice;
$item->getElementsByTagName('status')->item(0)->nodeValue = 'sold';
$xml->save($xmlFilePath);

echo "Thank you for purchasing this item.";
?>
