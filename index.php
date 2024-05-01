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
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php">Dimas Travel</a></h1>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link active" href="#hero">Home</a></li>
            <li><a class="nav-link" href="tentang.php">Tentang</a></li>
            <li><a class="nav-link" href="riwayat_pembelian.php">Tiket</a></li>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div
            class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <h1>Tiket Perjalanan Termurah</h1>
            <h2>
              Banyak Pilihan Rute Tersedia, Bisa Liburan Ke Mana Aja. Mau
              Liburan ke mana aja, semua bisa kamu atur dan beli tiketnya di
              sini
            </h2>
            <div class="d-flex justify-content-center justify-content-lg-start">
              <a href="#tiket" class="btn-get-started">Pilih Tiket</a>
              <a
                href="https://youtu.be/MoyAy2e8d3Y?si=Zc3Zwd5-jnb2tplu"
                class="btn-watch-video"
                ><i class="bi bi-play-circle"></i><span>Tentang Kami</span></a
              >
            </div>
          </div>
          <div
            class="col-lg-6 order-1 order-lg-2 hero-img"
            data-aos="zoom-in"
            data-aos-delay="200"
          >
            <iframe
              width="560"
              height="315"
              src="https://www.youtube.com/embed/BFS9n4B_2xA?si=KJWZGxZ6mxwozbBN"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
        <div class="container">
          <div class="row" data-aos="zoom-in">
            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-1.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-2.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-3.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-4.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-5.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div
              class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center"
            >
              <img
                src="assets/img/clients/client-6.png"
                class="img-fluid"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>
      <!-- End Cliens Section -->

      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Tentang Kami</h2>
          </div>

          <div class="row content">
            <div class="col-lg-6">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <ul>
                <li>
                  <i class="ri-check-double-line"></i> Jaminan Tiket Paling
                  Murah
                </li>
                <li>
                  <i class="ri-check-double-line"></i> Diskon Perjalanan Setiap
                  Saat
                </li>
                <li>
                  <i class="ri-check-double-line"></i> Tersedia Semua Destinasi
                  Pilihan
                </li>
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
              <a href="#" class="btn-learn-more">Pelajari Lebih Lanjut</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Us Section -->

      <!-- ======= tiket Section ======= -->
      <section id="tiket" class="portfolio">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Tempat bermain dengan diskon asik</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis
              accusantium quia eaque aliquam, perferendis optio alias corporis
              suscipit. Tenetur deleniti quisquam illo nesciunt fuga reiciendis
              soluta perferendis, mollitia quaerat eaque.
            </p>
          </div>

          <ul
            id="portfolio-flters"
            class="d-flex justify-content-center"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <li class="filter-active">All</li>
            <li>Bali</li>
            <li>banyuwangi</li>
            <li>Jember</li>
          </ul>

          <div
            class="row row-cols-md-4"
            data-aos="fade-up"
            data-aos-delay="200"
          >
          <!-- card -->
            <div class="col">
              <div class="card h-100">
                <img
                  src="./assets/img/card-1.jpg"
                  class="card-img-top"
                  alt="ubud"
                />
                <div class="card-body">
                  <h5 class="card-title">Ubud</h5>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate molestiae voluptate sint assumenda eos
                  </p>
                  <div class="card-button">
                    <a href="pemesanan.php" class="btn btn-primary"
                      >Pesan Sekarang</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img
                  src="./assets/img/card-5.jpg"
                  class="card-img-top"
                  alt="Palm Springs Road"
                />
                <div class="card-body">
                  <h5 class="card-title">Uluwatu</h5>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate molestiae voluptate sint assumenda eos
                  </p>
                  <div class="card-button">
                    <a href="pemesanan.php" class="btn btn-primary"
                      >Pesan Sekarang</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img
                  src="./assets/img/card-3.jpg"
                  class="card-img-top"
                  alt="Pura Agung Besakih"
                />
                <div class="card-body">
                  <h5 class="card-title">Pura Agung Besakih</h5>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate molestiae voluptate sint assumenda eos
                  </p>
                  <div class="card-button">
                    <a href="pemesanan.php" class="btn btn-primary"
                      >Pesan Sekarang</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img
                  src="./assets/img/card-4.jpg"
                  class="card-img-top"
                  alt="Nusa Dua Bali"
                />
                <div class="card-body">
                  <h5 class="card-title">Nusa Dua Bali</h5>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate molestiae voluptate sint assumenda eos
                  </p>
                  <div class="card-button">
                    <a href="pemesanan.php" class="btn btn-primary"
                      >Pesan Sekarang</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <!-- end card -->
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
