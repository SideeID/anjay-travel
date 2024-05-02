<?php
session_start();
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
            <li><a class="nav-link active" href="#">Tentang</a></li>
            <li><a class="nav-link" href="riwayat_pembelian.php">Tiket</a></li>
            <?php
            if (isset($_SESSION["login"])) {
              echo '<li class="nav-item dropdown"><a href="#"><span>'. $name .'</span> <i class="bi bi-chevron-down"></i></a>
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

    <main>
          <section id="about" class="about">
            <div class="container" data-aos="fade-up">
              <div class="section-title">
                <h2>Tentang Kami</h2>
                <div>
                  <img src="./assets/img/avatar.png" alt="" class="img-thumbnail">
                </div>
              </div>

              <div class="row content">
                <div class="col-lg-6">
                  <p>
                    <?php 
                    $file = fopen("./assets/text/konten1.txt", "r");
                    while(!feof($file)) {
                      echo fgets($file);
                    };
                    ?>
                  </p>
                  <ul>
                    <li>
                      <i class="ri-check-double-line"></i> Jaminan Tiket Paling
                      Murah
                    </li>
                    <li>
                      <i class="ri-check-double-line"></i> Pelayanan Terbaik
                    </li>
                    <li>
                      <i class="ri-check-double-line"></i> Jaminan Keamanan
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                  <p>
                    <i class="bi bi-geo-alt"></i>
                    <?php 
                    $file = fopen("./assets/text/konten2.txt", "r");
                    while(!feof($file)) {
                      echo fgets($file);
                    };
                    ?>
                  </p>
                  <p>
                    <i class="bi bi-envelope"></i>
                    <?php 
                    $file = fopen("./assets/text/email.txt", "r");
                    while(!feof($file)) {
                      echo fgets($file);
                    };
                    ?>
                  </p>
                  <p>
                    <i class="bi bi-phone"></i>
                    <?php 
                    $file = fopen("./assets/text/phone.txt", "r");
                    while(!feof($file)) {
                      echo fgets($file);
                    };
                    ?>
                  </p>
                  <a href="#" class="btn-learn-more">Pelajari Lebih Lanjut</a>
                </div>
              </div>
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
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
