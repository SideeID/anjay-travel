<?php
session_start();
require_once "../process/koneksi.php";
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

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data pesanan berdasarkan ID dari database
$query = "SELECT * FROM pesanan WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Pastikan data tersedia sebelum mencoba mengaksesnya
if (!$data) {
    echo "Data tidak ditemukan";
    exit();
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
                    <li><a href="index.php">Admin</a></li>
                    <li>Form Edit</li>
                </ol>
                <h2>Data Master</h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->
        <div class="container my-5">
            <form action="../process/process_edit_pesanan.php" method="post">
    <!-- Isi nilai yang sudah ada ke dalam input -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['nama']; ?>" required>
    </div>
              <div class="mb-3">
                <label for="identity" class="form-label">Nomor Identitas</label>
                <input type="number" class="form-control" id="identity" name="identity" value="<?php echo $data['nomor_identitas']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $data['tanggal']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="package" class="form-label">Jenis Kamar</label>
                <input type="text" class="form-control" id="package" name="package" value="<?php echo $data['jenis_paket']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="passengers" class="form-label">Jumlah Penginap/Orang</label>
                <input type="number" class="form-control" id="passengers" name="passengers" value="<?php echo $data['jumlah_penginap']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="stay_length" class="form-label">Lama Menginap/Hari</label>
                <input type="number" class="form-control" id="stay_length" name="stay_length" value="<?php echo $data['lama_menginap']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="consumption" class="form-label">Konsumsi [1 = iya, 0 = tidak]</label>
                <input type="text" class="form-control" id="consumption" name="consumption" value="<?php echo $data['konsumsi']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="transportation" class="form-label">Transportasi [1 = iya, 0 = tidak]</label>
                <input type="text" class="form-control" id="transportation" name="transportation" value="<?php echo $data['transportasi']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="discount" class="form-label">Diskon</label>
                <input type="number" class="form-control" id="discount" name="discount" value="<?php echo $data['diskon']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="total_cost" class="form-label">Total</label>
                <input type="number" class="form-control" id="total_cost" name="total_cost" value="<?php echo $data['total_biaya']; ?>" required>
              </div>
              <button type="submit" class="btn btn-primary" name="edit_pesanan">Edit</button>
            </form>
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
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
  </body>