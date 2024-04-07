<?php
$xmlFilePath = '../../data/auction.xml'; 
$xml = new DOMDocument();
$xml->load($xmlFilePath);
$xpath = new DOMXPath($xml);
$now = new DateTime();

$itemsProcessed = 0;

foreach ($xpath->query('/auction/items/item') as $item) {
    $status = $item->getElementsByTagName('status')->item(0)->nodeValue;
    $duration = new DateTime($item->getElementsByTagName('duration')->item(0)->nodeValue);

    if ($status == 'in progress' && $now > $duration) {
        $reservePrice = $item->getElementsByTagName('reservePrice')->item(0)->nodeValue;
        $bidPrice = $item->getElementsByTagName('bidPrice')->item(0)->nodeValue;
        
        if ($bidPrice >= $reservePrice) {
            $item->getElementsByTagName('status')->item(0)->nodeValue = 'sold';
        } else {
            $item->getElementsByTagName('status')->item(0)->nodeValue = 'failed';
        }
        
        $itemsProcessed++;
    }
}

$xml->save($xmlFilePath);
echo "Processed $itemsProcessed items.";
?>
