<!DOCTYPE html>
<html>
<head>
    <title>Hari Ini</title>
</head>
<body>

<h3>Hari Ini :</h3>

<?php

$nama_hari = date("l");

switch ($nama_hari) {

    case "Sunday":
        echo "Minggu <br>";
        echo "Waktu untuk istirahat";
        break;

    case "Monday":
        echo "Senin <br>";
        echo "Meeting awal minggu jam 08.00";
        break;

    case "Tuesday":
        echo "Selasa <br>";
        echo "Pembukaan Workshop Diklat";
        break;

    case "Wednesday":
        echo "Rabu <br>";
        echo "Seminar Launching Window Vista di JHCC";
        break;

    case "Thursday":
        echo "Kamis <br>";
        echo "Pertemuan dengan Mahasiswa";
        break;

    case "Friday":
        echo "Jumat <br>";
        echo "Jogging bersama";
        break;

    default:
        echo "Sabtu <br>";
        echo "Survey harga ke Dusit, Mangga Dua";
}

?>

</body>
</html>