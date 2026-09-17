<!DOCTYPE html>
<html>
<head>
    <title>Latihan Diskon</title>
</head>
<body>

<form method="post">
    Besar Pembelian :
    <input type="number" name="total_beli">
    <br><br>

    <input type="submit" value="Tentukan Diskon">
</form>

<?php
if (isset($_POST['total_beli'])) {

    $total_beli = intval($_POST['total_beli']);
    $diskon = 0;

    if ($total_beli >= 200000) {
        $diskon = 0.10;
    } elseif ($total_beli >= 100000) {
        $diskon = 0.05;
    } else {
        $diskon = 0.01;
    }

    $jumlah_diskon = $diskon * $total_beli;
    $bayar = $total_beli - $jumlah_diskon;

    echo "<h3>Hasil Perhitungan</h3>";
    echo "Total Pembelian : Rp " . number_format($total_beli,0,",",".") . "<br>";
    echo "Diskon : Rp " . number_format($jumlah_diskon,0,",",".") . "<br>";
    echo "Total Bayar : Rp " . number_format($bayar,0,",",".");
}
?>

</body>
</html>