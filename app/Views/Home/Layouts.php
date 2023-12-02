
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Geographic Information System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?=base_url()?>template/front/assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>template/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>template/front/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>template/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>template/front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/front/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>template/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>template/front/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>template/leaflet/leaflet.css" />
<script src="<?=base_url()?>template/leaflet/leaflet.js"></script>
<script src="<?=base_url()?>template/assets/js/jquery.js"></script>
  <!-- ==
  Author : Abdul Yamin
  Email : ocikyamin@gmail.com
  https://github.com/ocikyamin
  === -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
    <a href="./" class="d-flex align-items-center">
        <img src="<?=base_url()?>logo.png" width="67">
          <div>
        <h5 class="m-0" style="line-height: 16px;font-weight: bold;">Sekolah XYZ
            <div class="text-danger"><em style="font-size: 14px;">- Geographic Information System</em></div>
          </h5></div>
        
      </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#cta">Profile Sekolah</a></li>
          <li><a class="nav-link scrollto" href="#about">Persebaran Alumni</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Testimoni</a></li>       
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="./login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <?=$this->renderSection('content') ?>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>GIS</span></strong>. All Rights Reserved
        </div>
        <div class="credits">by <a href="https://github.com/ocikyamin">OcikYamin</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>template/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?=base_url()?>template/front/assets/vendor/aos/aos.js"></script>
  <script src="<?=base_url()?>template/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>template/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url()?>template/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url()?>template/front/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>template/front/assets/js/main.js"></script>

</body>

</html>