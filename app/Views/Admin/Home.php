<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>

<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
          <li class="breadcrumb-item active">Selamat Datang.</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Jumlah Alumni</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=CountData('jml_alumni')?></h6>
                      <!-- <a href="#" class="text-success small pt-1 fw-bold">Lihat Detail</a> -->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Laki-laki</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=CountData('jml_alumni_L')?></h6>
                      <!-- <a href="#" class="text-success small pt-1 fw-bold">Lihat Detail</a> -->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Perempuan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=CountData('jml_alumni_P')?></h6>
                      <!-- <a href="#" class="text-success small pt-1 fw-bold">Lihat Detail</a> -->
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


                   <!-- Customers Card -->
                   <div class="col-xxl-4 col-xl-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Provinsi</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-map"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=CountData('jml_prov')?></h6>
                      <!-- <a href="#" class="text-success small pt-1 fw-bold">Lihat Detail</a> -->
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

                   <!-- Customers Card -->
                   <div class="col-xxl-4 col-xl-12">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Kabupaten / Kota</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-map"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=CountData('jml_kab')?></h6>
                      <!-- <a href="#" class="text-success small pt-1 fw-bold">Lihat Detail</a> -->
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

                   <!-- Customers Card -->
                   <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Kecamatan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-map"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=CountData('jml_kec')?></h6>
                      <!-- <a href="#" class="text-success small pt-1 fw-bold">Lihat Detail</a> -->
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            

    
 
          </div>
        </div><!-- End Left side columns -->


      </div>

      <!-- Maps  -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Persebaran Alumni</h5>
        <div class="table-resvonsive">
            <div id="map" class="shadow-sm" style="width:100%;height:550px;border-radius:10px"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end maps -->
    </section>


    <script>
var map = L.map('map').setView([-0.6377214,111.5907425], 4.15);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var iconAlumni = L.icon({
    iconUrl: "<?=base_url('template/icon/alumni.png')?>",
    iconSize:     [38, 38], // size of the icon
});

<?php
foreach ($persebaran as $p) {?>

L.marker([<?=$p['latitude']?>,<?=$p['longitude']?>], {icon: iconAlumni}).addTo(map)
    .bindPopup(`
    <p>
    INFORMASI ALUMNI
    </p>
    <table class="table table-sm table-striped">
    <tr>
    <td>Nama Alumni</td>
    <td>:</td>
    <td><?=$p['nama_alumni']?></td>
    </tr>

    <tr>
    <td>Tahun Lulus</td>
    <td>:</td>
    <td><?=$p['tahun_lulus']?></td>
    </tr>

    <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?=$p['alamat']?></td>
    </tr>
    <tr>
    <td colspan="3"><img src="<?=base_url('gambar/'.$p['gambar'])?>" class="img-thumbnail"></td>
    </tr>

    </table>
   
  <div class="text-center mt-3">
  <a href="#" onclick="Hapus(<?=$p['id']?>)" class="btn btn-danger btn-sm text-white">Hapus</a>
  </div>
    `);

    <?php } ?>
</script>
<?= $this->endSection() ?>