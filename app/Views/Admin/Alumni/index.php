<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Alumni</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Alumni</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Daftar Alumni</h5>
        <div class="row">
          <div class="col-lg-3">
            <button onclick="refreshPage()" class="btn btn-primary btn-sm"><i class="bi bi-search"></i> Semua Data</button>
          <div class="dropdown d-inline">
          <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-filter"></i> Filter Data
          </a>

          <ul class="dropdown-menu">
          <li><a class="dropdown-item" id="by-tahun" href="#">By Tahun Lulus</a></li>
          <li><a class="dropdown-item" id="by-provinsi" href="#">By Provinsi</a></li>
          <li><a class="dropdown-item" id="by-pekerjaan" href="#">By Pekerjaan</a></li>
          </ul>
          </div>
          </div>
          <div class="col-lg-8">
            <div class="row" id="filter-area"></div>
          </div>
        </div>     
        <!-- Table with stripped rows -->
        <hr>
        <div id="filter_result">

       
        <div class="table-responsive" >
            <table class="table table-sm table-striped datatable">
            <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">JK</th>
            <th scope="col">Tahun Lulus</th>
            <th scope="col">Lat-long</th>
            <th scope="col">Foto</th>
            <th scope="col"><i class="bi bi-gear"></i></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach ($list as $r) {?>
            <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$r['nama_alumni']?></td>
            <td><?=$r['jk']?></td>
            <td><?=$r['tahun_lulus']?></td>
            <td>
              <li><?=$r['latitude']?></li>
              <li><?=$r['longitude']?></li>
               </td>
            <td><img src="<?=base_url('gambar/'.$r['gambar'])?>" class="img-thumbnail" width="50px" height="50px"></td>
  
            <td>
              <a href="<?=base_url('admin/alumni/detail/'.$r['id'])?>" class="btn btn-info btn-sm"><i class="bi bi-search"></i> Detail</a>
            <button type="button" onclick="Hapus(<?=$r['id']?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
        </div>
        <!-- End Table with stripped rows -->

        </div>
        </div>
    </div>
</div>
</section>

<script>
  function refreshPage() {
    window.location.reload();
}
$('#by-tahun').click(function (e) { 
e.preventDefault();
$('#filter-area').html(` <div class="col-lg-3">
<div class="dropdown">
<a class="btn btn-secondary btn-sm btn-block dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Pilih Tahun
</a>

<ul class="dropdown-menu">
<?php
foreach (ListTahun() as $t) {
?>
<li><a class="dropdown-item" onclick="byTahun(<?=$t['tahun_lulus']?>)" href="#">Tahun <?=$t['tahun_lulus']?></a></li>
<?php
}
?>

</ul>
</div>
</div>`)

});

$('#by-provinsi').click(function (e) { 
e.preventDefault();
$('#filter-area').html(`<div class="col-lg-4">
<div class="dropdown">
<a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Pilih Provinsi
</a>

<ul class="dropdown-menu">
<?php
foreach ($prov as $d) {
?>
<li><a class="dropdown-item" onclick="byProvinsi(<?=$d['id']?>)" href="#"><?=$d['provinsi']?></a></li>
<?php
}
?>

</ul>
</div>

</div>`)

});

$('#by-pekerjaan').click(function (e) { 
e.preventDefault();
$('#filter-area').html(`<div class="col-lg-4">
<div class="dropdown">
<a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Pilih Pekerjaan
</a>

<ul class="dropdown-menu">
<?php
foreach ($pekerjaan as $d) {
?>
<li><a class="dropdown-item" onclick="byPekerjaan(<?=$d['id']?>)" href="#"><?=$d['pekerjaan']?></a></li>
<?php
}
?>

</ul>
</div>

</div>`)

});



  // byTahun
function byTahun(tahun) {
//  alert(tahun)
$.ajax({
  url: "<?=base_url('admin/alumni/tahun')?>",
  data: {tahun:tahun},
  dataType: "json",
  success: function (response) {
    $('#filter_result').html(response.view)
  }
});
}

// By provinsi

function byProvinsi(id) {

$.ajax({
  url: "<?=base_url('admin/alumni/prov')?>",
  data: {prov:id},
  dataType: "json",
  success: function (response) {
    $('#filter_result').html(response.view)
  }
});
}

// byPekerjaan


function byPekerjaan(id) {

$.ajax({
  url: "<?=base_url('admin/alumni/pekerjaan')?>",
  data: {pekerjaan:id},
  dataType: "json",
  success: function (response) {
    $('#filter_result').html(response.view)
  }
});
}
</script>

<?= $this->endSection() ?>