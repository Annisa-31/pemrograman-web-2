<!DOCTYPE html>
<html>
<head>
    <title>Tabel Perkalian</title>
    <style>
        table{
            border-collapse: collapse;
        }

        td, th{
            border:1px solid black;
            padding:8px;
            text-align:center;
            width:50px;
        }

        th{
            background-color:lightblue;
        }
    </style>
</head>
<body>

<h2>Tabel Perkalian 1 - 10</h2>

<table>

<tr>
    <th>X</th>

    <?php
    for($i=1;$i<=10;$i++){
        echo "<th>$i</th>";
    }
    ?>
</tr>

<?php

for($baris=1;$baris<=10;$baris++){

    echo "<tr>";
    echo "<th>$baris</th>";

    for($kolom=1;$kolom<=10;$kolom++){

        echo "<td>".$baris*$kolom."</td>";

    }

    echo "</tr>";
}

?>

</table>

</body>
</html>