<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
} elseif ($_SESSION["role"] != "admin") {
    header("Location: ../index.php");
    exit();
}
$name = "Guest";
if (isset($_SESSION["login"])) {
    if (isset($_SESSION["name"])) {
        $name = $_SESSION["name"];
    }
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
    <link href="../assets/img/avatar.png" rel="icon" />
    <link href="../assets/img/avatar.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="../assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="../assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php">Dimas Travel</a></h1>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link" href="../index.php">Home</a></li>
            <li><a class="nav-link" href="index.php">admin</a></li>
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

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="../index.php">Home</a></li>
                    <li>Pengeditan Data</li>
                </ol>
                <h2>Pengeditan Data</h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="inner-page">
          <div class="container">
            <?php
            echo'
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis paket</th>
                    <th scope="col">Jumlah penumpang</th>
                    <th scope="col">Lama menginap</th>
                    <th scope="col">Penginapan</th>
                    <th scope="col">Konsumsi</th>
                    <th scope="col">Transportasi</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              ';
            ?>
          </div>
        </section>
    </main>
    <!-- End #main -->
  
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
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
