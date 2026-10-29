<?php
// TAHAP 2: KONEKSI KE DATABASE MYSQL
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pendaftaran";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// TAHAP 3 & 4:PROSES TANGKAP DATA FORM, OLAH, DAN SIMPAN (INSERT) KE MYSQL
if (isset($_POST['simpan'])) {
    $tgl_input      = $_POST['tgl_input'];
    $kode           = strtoupper($_POST['kode']);
    $nama           = $_POST['nama'];
    $jk             = $_POST['jk'];
    $asal_sekolah   = $_POST['asal_sekolah'];
    $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];

    $mat            = $_POST['mat'];
    $bing           = $_POST['bing'];
    $umum           = $_POST['umum'];

    // 1. Hitung rata-rata
    $rata = ($mat + $bing + $umum) / 3;

    // 2. Menentukan keterangan lulus/cadangan/tidak lulus
    if ($rata >= 70) {
        $keterangan = "Lulus";
    } elseif ($rata >= 60) {
        $keterangan = "Cadangan";
    } else {
        $keterangan = "Tidak Lulus";
    }

    // 3. Menentukan tempat tes berdasarkan huruf awal kode
    $kode_awal = substr($kode, 0, 1);
    if ($kode_awal == "A") {
        $tempat_tes = "Gedung A";
    } elseif ($kode_awal == "B") {
        $tempat_tes = "Gedung B";
    } elseif ($kode_awal == "V") {
        $tempat_tes = "Viktor";
    } else {
        $tempat_tes = "Tidak Diketahui";
    }

    // 4. Query INSERT ke MySQL
    $query = "INSERT INTO mahasiswa 
              (tgl_input, kode, nama, jk, asal_sekolah, pekerjaan_ortu, tempat_lahir, tgl_lahir, mat, bing, umum, rata, keterangan, tempat_tes)
              VALUES 
              ('$tgl_input', '$kode', '$nama', '$jk', '$asal_sekolah', '$pekerjaan_ortu', '$tempat_lahir', '$tgl_lahir', '$mat', '$bing', '$umum', '$rata', '$keterangan', '$tempat_tes')";

    mysqli_query($koneksi, $query);

    // Refresh halaman agar form kembali bersih setelah simpan
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa Baru</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=date] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btn {
            background: blue;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        .btn:hover {
            background: darkblue;
        }

        .info {
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <form method="POST">

        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing" required>

        <label>Umum</label>
        <input type="number" name="umum" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>

    </form>

    <hr style="margin-top: 30px;">

    <!-- TAHAP 5: AMBIL DAN TAMPILKAN SEMUA DATA DARI MYSQL (SELECT) -->
    <h3>DAFTAR PESERTA TERDAFTAR</h3>

    <table>
        <tr>
            <th>No</th>
            <th>Tgl Input</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Tempat Lahir</th>
            <th>Tgl Lahir</th>
            <th>Asal Sekolah</th>
            <th>Pekerjaan Ortu</th>
            <th>Tempat Tes</th>
            <th>MAT</th>
            <th>B. Inggris</th>
            <th>Umum</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
        </tr>

        <?php
        $no = 1;
        $jumlah_pendaftar = 0;
        $jumlah_lulus = 0;
        $jumlah_tidak_lulus = 0;

        // Query mengambil seluruh data dari tabel mahasiswa
        $query_tampil = "SELECT * FROM mahasiswa ORDER BY id DESC";
        $data_mahasiswa = mysqli_query($koneksi, $query_tampil);

        // Perulangan menampilkan baris data dari database
        while ($row = mysqli_fetch_array($data_mahasiswa)) {
            $jumlah_pendaftar++;
            if ($row['keterangan'] == "Lulus") {
                $jumlah_lulus++;
            } else {
                $jumlah_tidak_lulus++;
            }
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['tgl_input']; ?></td>
                <td><?= $row['kode']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jk']; ?></td>
                <td><?= $row['tempat_lahir']; ?></td>
                <td><?= $row['tgl_lahir']; ?></td>
                <td><?= $row['asal_sekolah']; ?></td>
                <td><?= $row['pekerjaan_ortu']; ?></td>
                <td><?= $row['tempat_tes']; ?></td>
                <td><?= $row['mat']; ?></td>
                <td><?= $row['bing']; ?></td>
                <td><?= $row['umum']; ?></td>
                <td><?= number_format($row['rata'], 2); ?></td>
                <td><?= $row['keterangan']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <!-- REKAPITULASI DARI DATABASE -->
    <div class="info">
        <h3>Rekap Data:</h3>
        <p>Jumlah Pendaftar : <b><?= $jumlah_pendaftar; ?></b></p>
        <p>Jumlah Peserta Lulus : <b><?= $jumlah_lulus; ?></b></p>
        <p>Jumlah Tidak Lulus / Cadangan : <b><?= $jumlah_tidak_lulus; ?></b></p>
    </div>

    <div class="info">
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata ≥ 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata < 60 = Tidak Lulus</li>
        </ul>
    </div>

</div>

</body>
</html>
