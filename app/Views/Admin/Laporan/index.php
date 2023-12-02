<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">

<div class="row">

    <div class="col-lg-4">
        <div class="card bg-primary">
            <div class="card-body">
                <h5 class="card-title text-white">Laporan By Tahun</h5>
                <div class="dropdown">
                    <div class="d-grid gap-2">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Tahun
                    </a>
                    <ul class="dropdown-menu">
                    <?php
                    foreach (ListTahun() as $t) {
                    ?>
                    <li><a class="dropdown-item" target="_blank" href="<?=base_url('admin/laporan/tahun/'.$t['tahun_lulus'])?>">Tahun <b><?=$t['tahun_lulus']?></b></a></li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                  
                </div>
            </div>
        </div>
        </div>
    <!--  end col-3 -->

    <div class="col-lg-4">
        <div class="card bg-warning">
            <div class="card-body">
                <h5 class="card-title text-white">Laporan By Provinsi</h5>
                <div class="dropdown">
                    <div class="d-grid gap-2">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Provinsi
                    </a>
                    <ul class="dropdown-menu">
                    <?php
                    foreach ($prov as $d) {
                    ?>
                    <li><a class="dropdown-item" target="_blank" href="<?=base_url('admin/laporan/prov/'.$d['id'])?>"><?=$d['provinsi']?></a></li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                  
                </div>
            </div>
        </div>
        </div>
    <!--  end col-3 -->
    <div class="col-lg-4">
        <div class="card bg-success">
            <div class="card-body">
                <h5 class="card-title text-white">Laporan By Kab/Kota</h5>
                <div class="dropdown">
                    <div class="d-grid gap-2">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Kab/Kota
                    </a>
                    <ul class="dropdown-menu">
                    <?php
                    foreach ($kab as $d) {
                    ?>
                    <li><a class="dropdown-item" target="_blank" href="<?=base_url('admin/laporan/kab/'.$d['id'])?>"><?=$d['kabupaten']?></a></li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                  
                </div>
            </div>
        </div>
        </div>
    <!--  end col-3 -->


</div>



</section>

<?= $this->endSection() ?>