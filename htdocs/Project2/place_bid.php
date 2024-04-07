<?php
// Assuming session_start() and user authentication are handled appropriately
$itemID = $_POST['itemID'];
$newBid = $_POST['bidPrice'];

$xmlFilePath = '../../data/auction.xml'; 
$xml = new DOMDocument();
$xml->load($xmlFilePath);
$xpath = new DOMXPath($xml);

$item = $xpath->query("/auction/items/item[itemID='$itemID']")->item(0);
$currentBid = $item->getElementsByTagName('bidPrice')->item(0)->nodeValue;

if ($newBid > $currentBid) {
    $item->getElementsByTagName('bidPrice')->item(0)->nodeValue = $newBid;
    $xml->save($xmlFilePath);
    echo "Thank you! Your bid is recorded in ShopOnline.";
} else {
    echo "Sorry, your bid is not valid.";
}
?>
