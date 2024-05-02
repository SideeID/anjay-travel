<?php
session_start();
require_once "koneksi.php";

if (isset($_POST['pesanan_submit'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['name'];
    $gender = $_POST['gender'];
    $nomor = $_POST['identity'];
    $tanggal = $_POST['date'];
    $jenis_paket = $_POST['package'];
    $jumlah_penginap = $_POST['passengers'];
    $lama_menginap = $_POST['stay_length'];
    $diskon = $_POST['discount'];
    
    // Parse nilai total
    $total = preg_replace('/[^0-9,]/', '', $_POST['total_cost']); // Hanya mengizinkan angka dan koma
    $total = str_replace(',', '.', $total); // Mengganti koma menjadi titik decimal (untuk format numerik)
    $total = (float) $total;

    // jika user tidak memilih opsi
    if (!isset($_POST['options'])) {
        $transportasi = 0;
        $konsumsi = 0;
    } else {
        // Menginisialisasi nilai default untuk opsi tambahan yang bertipe data boolean
        $transportasi = in_array('Transportasi', $_POST['options']) ? 1 : 0;
        $konsumsi = in_array('Konsumsi', $_POST['options']) ? 1 : 0;
    }

    $query = "INSERT INTO pesanan (nama, gender, id_user, nomor_identitas, tanggal, jenis_paket, jumlah_penginap, lama_menginap, transportasi, konsumsi, diskon, total_biaya) 
              VALUES ('$nama', '$gender', '$id_user', '$nomor', '$tanggal', '$jenis_paket', '$jumlah_penginap', '$lama_menginap', '$transportasi', '$konsumsi', '$diskon', '$total')";
              
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
