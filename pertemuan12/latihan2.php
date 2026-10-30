<?php
$con = mysqli_connect("localhost", "root", "");

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_select_db($con, "lat_dbase");

mysqli_query($con, "DELETE FROM tbl_mhs WHERE LastName = 'Prabowo'");

echo "Data mahasiswa berhasil dihapus";

mysqli_close($con);
?>