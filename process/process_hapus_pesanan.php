<?php
// proses hapus data pesanan
session_start();
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pesanan WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>