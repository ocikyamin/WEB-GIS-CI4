<?= $this->extend('Users/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Wilayah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('user')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Provinsi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Daftar Provinsi</h5>
        <p>
        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Tambah Provinsi</button>
        </p>
        <!-- Table with stripped rows -->
        <div class="table-responsive">
            <table class="table table-sm table-striped">
            <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col"><i class="bi bi-gear"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Brandon Jacob</td>
            <td>Designer</td>
            <td>28</td>
            <td>
            <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-geo-alt"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
        <!-- End Table with stripped rows -->

        </div>
        </div>
    </div>
</div>
</section>
<?= $this->endSection() ?>