<?php
session_start();
require_once "koneksi.php";

if (isset($_POST['pesanan_submit'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['name'];
    $nomor = $_POST['phone'];
    $tanggal = $_POST['date'];
    $jenis_paket = $_POST['package'];
    $jumlah_penumpang = $_POST['passengers'];
    $lama_menginap = $_POST['stay_length'];
    $total = $_POST['total_cost'];

    // Menginisialisasi nilai default untuk opsi tambahan yang bertipe data boolean
    $penginapan = in_array('Penginapan', $_POST['options']) ? 1 : 0;
    $transportasi = in_array('Transportasi', $_POST['options']) ? 1 : 0;
    $konsumsi = in_array('Konsumsi', $_POST['options']) ? 1 : 0;


    $query = "INSERT INTO pesanan (nama, id_user, nomor_telepon, tanggal, jenis_paket, jumlah_penumpang, lama_menginap, penginapan, transportasi, konsumsi, total_biaya) 
              VALUES ('$nama', '$id_user', '$nomor', '$tanggal', '$jenis_paket', '$jumlah_penumpang', '$lama_menginap', '$penginapan', '$transportasi', '$konsumsi', '$total')";
              
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
