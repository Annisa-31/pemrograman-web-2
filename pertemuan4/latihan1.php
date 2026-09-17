<?php

$brush_price = 5000;
$counter = 10;

echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Quantity</th>
        <th>Price</th>
      </tr>";

while ($counter <= 100) {

    echo "<tr>";
    echo "<td>$counter</td>";
    echo "<td>Rp " . number_format($brush_price * $counter,0,",",".") . "</td>";
    echo "</tr>";

    $counter += 10;
}

echo "</table>";

?>