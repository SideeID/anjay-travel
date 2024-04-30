<?php
session_start();
require_once "koneksi.php";

// edit data pesanan
if (isset($_POST['edit_pesanan'])) {
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $nomor = $_POST['phone'];
    $tanggal = $_POST['date'];
    $jenis_paket = $_POST['package'];
    $jumlah_penumpang = $_POST['passengers'];
    $lama_menginap = $_POST['stay_length'];
    $penginapan = $_POST['accommodation'];
    $konsumsi = $_POST['consumption'];
    $transportasi = $_POST['transportation'];
    $total = $_POST['total_cost'];

    $query = "UPDATE pesanan SET nama = '$nama', nomor_telepon = '$nomor', tanggal = '$tanggal', jenis_paket = '$jenis_paket', jumlah_penumpang = '$jumlah_penumpang', lama_menginap = '$lama_menginap', penginapan = '$penginapan', konsumsi = '$konsumsi', transportasi = '$transportasi', total_biaya = '$total' WHERE id = '$id'";
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