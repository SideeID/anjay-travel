<?php
session_start();
$name = "Guest";
if (isset($_SESSION["login"])) {
    if (isset($_SESSION["name"])) {
        $name = $_SESSION["name"];
    }
    if (isset($_SESSION["id_user"])) {
        $id_user = $_SESSION["id_user"];
    };   
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
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/avatar.png" rel="avatar" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.php">Dimas Travel</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="riwayat_pembelian.php">Tiket</a></li>
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
                    <li><a href="index.php">Home</a></li>
                    <li>Pengisian Data</li>
                </ol>
                <h2>Pengisian Data</h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->
        <section class="inner-page">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <form action="./process/process_pesanan.php" method="POST">
                        <div class="d-flex gap-4">
                            <div class="d-flex gap-4">
                                <div>
                                    <?php
                                    if (isset($_SESSION["login"])) {
                                        echo '<div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" value="' . $name . '" required>
                                        </div>';
                                        echo '<input type="text" class="form-control" id="id_user" name="id_user" value="' . $id_user . '" hidden>';
                                        echo '<input type="text" class="form-control" id="discount" name="discount" value="0" hidden>';
                                    } else {
                                        echo '<div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>';
                                    }
                                    ?>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Pilih jenis kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="identity" class="form-label">Nomor Identitas</label>
                                        <input type="number" class="form-control" id="identity" name="identity" required minlength="16" maxlength="16">
                                        <div id="identity-error" class="text-danger" style="display: none;">isian salah..data harus 16 digit</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <label for="package" class="form-label">Tipe Kamar</label>
                                        <select class="form-select" id="package" name="package" required>
                                            <option value="">Pilih jenis kamar</option>
                                            <option value="Standar">Standar - 500.000/orang</option>
                                            <option value="Delux">Delux - 750.000/orang</option>
                                            <option value="Family">Family - 1.000.000/orang</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="passengers" class="form-label">Jumlah Penginap</label>
                                        <input type="number" class="form-control" id="passengers" name="passengers" required min="1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stay_length" class="form-label">Lama Menginap (Hari)</label>
                                        <p style="font-size: 10px;">diskon 10% jika menginap lebih dari 3 hari</p>
                                        <input type="number" class="form-control" id="stay_length" name="stay_length" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Opsi Tambahan</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="transportasi" name="options[]" value="Transportasi">
                                            <label class="form-check-label" for="transportasi">Transportasi</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="konsumsi" name="options[]" value="Konsumsi">
                                            <label class="form-check-label" for="konsumsi">Breakfast</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="mb-3">
                                    <label for="total_paket" class="form-label">Total Paket</label>
                                    <p style="font-size: 10px;">diskon: </p>
                                    <input type="text" class="form-control" id="total_paket" name="total_paket" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="total_layanan" class="form-label">Total Layanan</label>
                                    <input type="text" class="form-control" id="total_layanan" name="total_layanan" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="total_cost" class="form-label">Total Biaya</label>
                                    <input type="text" class="form-control" id="total_cost" name="total_cost" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="submit-button" name="pesanan_submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Dimas</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed with <a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/">Bootstrap</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/logika.js"></script>
                                    
</body>
</html>
