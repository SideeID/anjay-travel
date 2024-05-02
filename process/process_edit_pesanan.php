<?php
session_start();
require_once "koneksi.php";

if (isset($_POST['edit_pesanan'])) {
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $nomor = $_POST['identity'];
    $gender = $_POST['gender'];
    $tanggal = $_POST['date'];
    $jenis_paket = $_POST['package'];
    $jumlah_penginap = $_POST['passengers'];
    $lama_menginap = $_POST['stay_length'];
    $konsumsi = $_POST['consumption'];
    $transportasi = $_POST['transportation'];
    $diskon = $_POST['discount'];
    $total = $_POST['total_cost'];

    $query = "UPDATE pesanan SET nama = '$nama', nomor_identitas = '$nomor', gender = '$gender', tanggal = '$tanggal', jenis_paket = '$jenis_paket', jumlah_penginap = '$jumlah_penginap', lama_menginap = '$lama_menginap', konsumsi = '$konsumsi', transportasi = '$transportasi', diskon = '$diskon', total_biaya = '$total' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengupdate data: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>