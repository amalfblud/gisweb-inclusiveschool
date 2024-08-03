<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InclusiveSchool - Sekolah Inklusi dan Sekolah Luar Biasa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- JS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
            <div class="logo-text">
              <h1 class="text-light"><span>InclusiveSchool</span></h1>
            </div>
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link" href="index.php" accesskey="h">Home</a></li>
            <li class="dropdown"><a href="#" aria-label="Tentang Inklusi"><span>Tentang Inklusi </span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="infosi.php" accesskey="i">Sekolah Inklusi</a></li>
                <li><a href="kodekebsus.php" accesskey="k">Kode Kebutuhan Khusus</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="pencariansekolah.php" accesskey="s">Daftar Sekolah</a></li>
            <li><a class="nav-link" href="kontakkami.php" accesskey="c">Kontak Kami</a></li>
            <li><a class="loginlink" href="admins/login.php" accesskey="l">Login Admin</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  

  <!-- Modal -->
  <div class="modal fade" id="shortcutModal" tabindex="-1" aria-labelledby="shortcutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="shortcutModalLabel">Keyboard Shortcuts</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Tekan Shift + H untuk membuka informasi shortcut keyboard.</p>
          <p>Tekan Alt + H untuk ke halaman Home.</p>
          <p>Tekan Alt + I untuk ke halaman Tentang Sekolah Inklusi.</p>
          <p>Tekan Alt + K untuk ke halaman Tentang Kode Kebutuhan Khusus.</p>
          <p>Tekan Alt + S untuk ke halaman Daftar Sekolah.</p>
          <p>Tekan Alt + C untuk ke halaman Kontak.</p>
          <p>Tekan Alt + L untuk ke halaman Login Admin.</p>
          <!-- Add more shortcut information here -->
        </div>
        <div class="modal-footer">
          <button id="toggleAccessKeyButton" class="btn btn-danger">Matikan Shortcut Keyboard</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
