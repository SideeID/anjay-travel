<?php
session_start();
require_once "./process/koneksi.php";

$name = "Guest";
if (isset($_SESSION["login"])) {
    if (isset($_SESSION["name"])) {
        $name = $_SESSION["name"];
    }
}

// riwayat pembelian user
if(isset($_SESSION['login'])){
    $id_user = $_SESSION['id_user'];
    $query = "SELECT * FROM pesanan WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);
    if($result){
        $pesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
        echo "Terjadi kesalahan saat mengambil data: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dimas Travel</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/avatar.png" rel="icon" />
    <link href="assets/img/avatar.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="./assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header-inner-pages">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php">Dimas Travel</a></h1>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="tentang.php">Tentang</a></li>
            <li><a class="nav-link active" href="#">Tiket</a></li>
            <?php
            if (isset($_SESSION["login"])) {
              echo '<li class="dropdown"><a href="#"><span>'. $name .'</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li><a href="./process/process_logout.php">Logout</a></li>
                    </ul>
                  </li>';
            } else {
              echo '<li><a class="getstarted" href="login.php">Login</a></li>';
            }
            ?>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      </div>
    </header>
    <!-- End Header -->

    <div class="container">
      <div class="h-100">
            <h1>Riwayat Pembelian</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>No</th> -->
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal</th>
                    <th>Jenis Paket</th>
                    <th>Jumlah Penumpang</th>
                    <th>Lama Menginap</th>
                    <th>Penginapan</th>
                    <th>Konsumsi</th>
                    <th>Transportasi</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $no = 1;
                foreach ($pesanan as $p) {
                    echo "<tr>";
                    // echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $p['nama'] . "</td>";
                    echo "<td>" . $p['nomor_telepon'] . "</td>";
                    echo "<td>" . $p['tanggal'] . "</td>";
                    echo "<td>" . $p['jenis_paket'] . "</td>";
                    echo "<td>" . $p['jumlah_penumpang'] . "</td>";
                    echo "<td>" . $p['lama_menginap'] . "</td>";
                    echo "<td>" . $p['penginapan'] . "</td>";
                    echo "<td>" . $p['konsumsi'] . "</td>";
                    echo "<td>" . $p['transportasi'] . "</td>";
                    echo "<td>" . $p['total_biaya'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>
<!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container footer-bottom clearfix">
        <div class="copyright">
          &copy; Copyright <strong><span>Dimas</span></strong
          >. All Rights Reserved
        </div>
        <div class="credits">
          Designed with
          <a
            href="https://getbootstrap.com/docs/5.3/getting-started/introduction/"
            >Bootstrap</a
          >
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
