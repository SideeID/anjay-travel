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
$query = "SELECT * FROM pesanan";
$result = mysqli_query($koneksi, $query);
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
                    <li>Admin</li>
                </ol>
                <h2>Data Master</h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="inner-page">
          <div class="container">
              <table class="table table-striped table-hover">
                <thead class="">
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
              <?php
              while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['nomor_telepon'] . "</td>";
                echo "<td>" . $data['tanggal'] . "</td>";
                echo "<td>" . $data['jenis_paket'] . "</td>";
                echo "<td>" . $data['jumlah_penumpang'] . " Orang</td>";
                echo "<td>" . $data['lama_menginap'] .  " Hari</td>";
                echo "<td>" . ($data['penginapan'] == 1 ? 'tambah' : 'tidak') . "</td>";
                echo "<td>" . ($data['konsumsi'] == 1 ? 'tambah' : 'tidak') . "</td>";
                echo "<td>" . ($data['transportasi'] == 1 ? 'tambah' : 'tidak') . "</td>";
                echo "<td>" . $data['total_biaya'] . "</td>";
                echo "<td>
                <div class='d-flex gap-3'>
                <a href='edit.php?id=". $data['id'] ."'>
                <i class='bi bi-pencil' data-bs-toggle='modal' data-bs-target='#exampleModal'></i>
                </a>
                <a href='../process/process_hapus_pesanan.php?id=" . $data['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>
                <i class='bi bi-trash'></i>
                </a>
                </div>
                </td>";
                echo "</tr>";
              }
              ?>
              </table>
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

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Pesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- <form action="../process/process_edit_pesanan.php" method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Nomor</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
              <div class="mb-3">
                <label for="package" class="form-label">Jenis Paket</label>
                <input type="text" class="form-control" id="package" name="package" required>
              </div>
              <div class="mb-3">
                <label for="passengers" class="form-label">Jumlah Penumpang</label>
                <input type="number" class="form-control" id="passengers" name="passengers" required>
              </div>
              <div class="mb-3">
                <label for="stay_length" class="form-label">Lama Menginap</label>
                <input type="number" class="form-control" id="stay_length" name="stay_length" required>
              </div>
              <div class="mb-3">
                <label for="accommodation" class="form-label">Penginapan</label>
                <input type="text" class="form-control" id="accommodation" name="accommodation" required>
              </div>
              <div class="mb-3">
                <label for="consumption" class="form-label">Konsumsi</label>
                <input type="text" class="form-control" id="consumption" name="consumption" required>
              </div>
              <div class="mb-3">
                <label for="transportation" class="form-label">Transportasi</label>
                <input type="text" class="form-control" id="transportation" name="transportation" required>
              </div>
              <div class="mb-3">
                <label for="total_cost" class="form-label">Total</label>
                <input type="number" class="form-control" id="total_cost" name="total_cost" required>
              </div>
              <button type="submit" class="btn btn-primary" name="edit_pesanan">Edit</button>
            </form> -->
          </div>
        </div>
      </div>
    </div>
      
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
