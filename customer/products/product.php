<?php


// Display products
echo "<h2>Products</h2>";
echo "<ul>";
while($row = $result->fetch_assoc()) {
    echo "<li>" . $row["product_name"] . "</li>";
}
echo "</ul>";
?>