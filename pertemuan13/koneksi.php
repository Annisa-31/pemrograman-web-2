<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mhs";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>