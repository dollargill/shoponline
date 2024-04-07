<?php
$xmlFilePath = '../../data/auction.xml'; // Ensure this is the correct path to your auction.xml
$xml = new SimpleXMLElement(file_get_contents($xmlFilePath));

echo '<div id="items">';
foreach ($xml->items->item as $item) {
    $endTime = new DateTime($item->duration);
    $now = new DateTime();
    $timeLeft = $endTime > $now ? $endTime->diff($now)->format('%a days %h hours %i minutes') : 'Expired';
    $status = $item->status == 'in progress' && $endTime > $now ? 'In Progress' : 'Expired or Sold';

    // Only show Place Bid and Buy Now buttons if the item is in progress and not yet expired
    $actionButtons = $item->status == 'in progress' && $endTime > $now ?
        "<button onclick='placeBid(\"$item->itemID\")'>Place Bid</button>
        <button onclick='buyNow(\"$item->itemID\", \"$item->buyItNowPrice\")'>Buy Now</button>" :
        "<p>Item has been sold or the time expired</p>";

    echo "<div class='item'>
            <p>Item Number: $item->itemID</p>
            <p>Name: $item->itemName</p>
            <p>Category: $item->category</p>
            <p>Description: ".substr($item->description, 0, 30)."...</p>
            <p>Buy It Now Price: \$$item->buyItNowPrice</p>
            <p>Current Bid Price: \$$item->bidPrice</p>
            <p>Duration of Bid: $timeLeft</p>
            $actionButtons
          </div>";
}
echo '</div>';
?>
