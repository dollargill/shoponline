<?php
// This PHP block is to load and display items from auction.xml
$xmlFilePath = '../../data/auction.xml'; // Adjust path as needed
$xml = simplexml_load_file($xmlFilePath);

echo "<table border='1'>";
echo "<tr><th>Item Name</th><th>Category</th><th>Description</th><th>Current Bid</th><th>Actions</th></tr>";
foreach ($xml->items->item as $item) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($item->itemName) . "</td>";
    echo "<td>" . htmlspecialchars($item->category) . "</td>";
    echo "<td>" . htmlspecialchars($item->description) . "</td>";
    echo "<td>$" . htmlspecialchars($item->bidPrice) . "</td>";
    echo "<td>
            <button onclick='placeBid(\"" . htmlspecialchars($item->itemID) . "\")'>Place Bid</button>
            <button onclick='buyNow(\"" . htmlspecialchars($item->itemID) . "\")'>Buy Now</button>
          </td>";
    echo "</tr>";
}
echo "</table>";
?>

<script>
// JavaScript to refresh the item list every 5 seconds
setInterval(() => {
    window.location.reload();
}, 5000);

function placeBid(itemID) {
    // Implement the function to handle placing a bid
    alert("This will place a bid for item ID: " + itemID);
    // Likely involves calling another PHP script via AJAX with the itemID and new bid amount
}

function buyNow(itemID) {
    // Implement the function to handle Buy Now
    alert("This will buy the item ID: " + itemID + " immediately.");
    // Similarly, involves calling a PHP script via AJAX
}
</script>
