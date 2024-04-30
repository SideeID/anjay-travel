<?php
session_start();
require_once "koneksi.php";

if (isset($_POST['register_submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (name, email, password, level) VALUES ('$name', '$email', '$password', 2)";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION["login"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        header("Location: ../login.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>