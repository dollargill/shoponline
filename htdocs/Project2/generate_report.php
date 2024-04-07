<?php
$xmlFilePath = '../../data/auction.xml'; 
$xml = new DOMDocument();
$xml->load($xmlFilePath);
$xpath = new DOMXPath($xml);

$soldItems = 0;
$failedItems = 0;
$revenue = 0;

foreach ($xpath->query('/auction/items/item') as $item) {
    $status = $item->getElementsByTagName('status')->item(0)->nodeValue;
    if ($status == 'sold') {
        $soldPrice = $item->getElementsByTagName('bidPrice')->item(0)->nodeValue;
        $revenue += $soldPrice * 0.03; // 3% of sold price
        $soldItems++;
        $item->parentNode->removeChild($item); // Remove item from XML
    } elseif ($status == 'failed') {
        $reservePrice = $item->getElementsByTagName('reservePrice')->item(0)->nodeValue;
        $revenue += $reservePrice * 0.01; // 1% of reserve price
        $failedItems++;
        $item->parentNode->removeChild($item); // Remove item from XML
    }
}

$xml->save($xmlFilePath);

echo "Report Generated:<br>";
echo "Sold Items: $soldItems<br>";
echo "Failed Items: $failedItems<br>";
echo "Total Revenue: $" . number_format($revenue, 2) . "<br>";
?>
