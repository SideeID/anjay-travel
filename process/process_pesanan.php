<?php
session_start();
require_once "koneksi.php";

if (isset($_POST['pesanan_submit'])) {
    // $id_user = $_SESSION['id_user'];
    $nama = $_POST['name'];
    $nomor = $_POST['phone'];
    $tanggal = $_POST['date'];
    $jenis_paket = $_POST['package'];
    $jumlah_penumpang = $_POST['passengers'];
    $lama_menginap = $_POST['stay_length'];
    // $opsi_tambahan = $_POST['option'];
    $total = $_POST['total_cost'];

    $query = "INSERT INTO pesanan (nama, nomor, tanggal, jenis_paket, jumlah_penumpang, lama_penginap, total) VALUES ('$nama', '$nomor', '$tanggal', '$jenis_paket', '$jumlah_penumpang', '$lama_menginap', '$total')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>