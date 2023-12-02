<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard | GIS SMPN 1 Bukiitinggi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?=base_url()?>template/assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="<?=base_url()?>template/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <!-- Template Main CSS File -->
  <!-- leaflet -->
  <link rel="stylesheet" href="<?=base_url()?>template/leaflet/leaflet.css" />
<script src="<?=base_url()?>template/leaflet/leaflet.js"></script>
  <link href="<?=base_url()?>template/assets/css/style.css" rel="stylesheet">
  <script src="<?=base_url()?>template/assets/js/jquery.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=base_url('admin')?>" class="logo d-flex align-items-center">
        <img src="<?=base_url()?>template/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">GiS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <DIV class="search-form d-flex align-items-center">
        SMPN 1 BUKITTINGGI
      </DIV>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url()?>template/img/tes.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=AdminLogin()->nama?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=AdminLogin()->nama?></h6>
              <span><?=AdminLogin()->email?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('admin/profile')?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('admin/profile')?>">
                <i class="bi bi-gear"></i>
                <span>Ganti Password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('admin/logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('admin')?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('admin/wilayah/provinsi')?>">
              <i class="bi bi-circle"></i><span>Wilayah</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/pekerjaan')?>">
              <i class="bi bi-circle"></i><span>Pekerjaan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

       

<li class="nav-heading">Alumni</li>
<li class="nav-item">
<a class="nav-link collapsed" href="<?=base_url('admin/alumni/all')?>">
<i class="bi bi-people"></i>
<span>Alumni</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="<?=base_url('admin/laporan')?>">
<i class="bi bi-printer"></i>
<span>Laporan</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="<?=base_url('admin/testimoni')?>">
<i class="bi bi-people-fill"></i>
<span>Testimoni</span>
</a>
</li>



      <li class="nav-heading">admins</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('admin/profile')?>">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('admin/logout')?>">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
  <?=$this->renderSection('content') ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>GIS (Abdul Yamin)</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>template/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>template/assets/vendor/quill/quill.min.js"></script>
  
  <script src="<?=base_url()?>template/assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>template/assets/js/main.js"></script>
  <!-- <script>
    if ("geolocation" in navigator) {
  navigator.geolocation.getCurrentPosition(function(position) {
    console.log("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
  });
} else {
  console.log("Geolocation is not supported by this browser.");
}
  </script> -->
<script>
      function Hapus(id) {
    //    return confirm('Apakah Yakin ?');
    
      $.ajax({
            type :"post",
            url: "<?=base_url('admin/hapus')?>",
            data: {id:id,table: "tb_alumni"},
            dataType: "json",
            success: function (response) {
                if (response.res) {
                    alert('Berhasil Dihapus');
                    window.location.reload();
                }
            }
        });
       
      }
</script>
</body>

</html>