
<?php

// Cek button
if (isset($_POST['Submit']) && $_POST['Submit'] == "Submit") {

    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Validasi data kosong
    if (
        empty($id_mahasiswa) ||
        empty($nama) ||
        empty($alamat) ||
        empty($telepon) ||
        empty($jurusan) ||
        $jurusan == "-"
    ) {
        ?>
        <script>
        alert('Data Harap Dilengkapi!');
        document.location='latihan.php';
        </script>
        <?php
        exit;
    }

    // Koneksi database
    include "koneksi.php";

    // Cek NIM di database
    $sql = "SELECT id_mahasiswa FROM mahasiswa
            WHERE id_mahasiswa='$id_mahasiswa'";

    $cek = mysqli_num_rows(mysqli_query($connection, $sql));

    if ($cek > 0) {
        ?>
        <script>
        alert('NIM sudah dipakai!, silahkan ganti NIM yang lain');
        document.location='latihan.php';
        </script>
        <?php
        exit;
    }

    // Masukkan data ke tabel
    $input = "INSERT INTO mahasiswa
    (id_mahasiswa, nama, jurusan, alamat, telepon)
    VALUES
    ('$id_mahasiswa', '$nama', '$jurusan', '$alamat', '$telepon')";

    $query_input = mysqli_query($connection, $input);

    if ($query_input) {
        ?>
        <script>
        alert('Input Data Mahasiswa Berhasil');
        document.location='latihan.php';
        </script>
        <?php
    } else {
        echo "Input Data Mahasiswa Gagal! " .
             mysqli_error($connection);
    }

    // Tutup koneksi
    mysqli_close($connection);
}
?>
