<?php
session_start();
require_once "koneksi.php";


if (isset($_POST['login_submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];
            $role = $row['level'];

            if ($password === $storedPassword) {
                $_SESSION["login"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $row['name'];
                $_SESSION["id_user"] = $row['id'];

                if ($role == 1) {
                    $_SESSION["role"] = "admin";
                    header("Location: ../admin/index.php");
                } elseif ($role == 2) {
                    $_SESSION["role"] = "user";
                    header("Location: ../index.php");
                }
                exit();
            } else {
                echo "Password salah";
            }
        } else {
            echo "Email tidak ditemukan";
        }
    } else {
        echo "Terjadi kesalahan saat mengambil data dari database: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>