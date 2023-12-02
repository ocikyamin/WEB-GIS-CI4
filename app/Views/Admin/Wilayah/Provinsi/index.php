<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Wilayah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
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
        <button type="button" onclick="Add()" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Tambah Provinsi</button>
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
                <?php
                $i=1;
                foreach ($prov as $r) {?>
            <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$r['provinsi']?></td>
            <td><?=$r['latitude']?></td>
            <td><?=$r['longitude']?></td>
            <td>
            <a href="<?=base_url('admin/wilayah/provinsi/'.$r['id'])?>" class="btn btn-secondary btn-sm"><i class="bi bi-gear"></i> Kabupaten</a>
            <button type="button" onclick="Edit(<?=$r['id']?>)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
            <button type="button" onclick="HapusProv(<?=$r['id']?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
        <!-- End Table with stripped rows -->

        </div>
        </div>
    </div>
</div>
</section>
<div id="modalview"></div>
<script>
    function Add() {
        $.ajax({
            url: "<?=base_url('admin/provinsi/add')?>",
            data: "data",
            dataType: "json",
            success: function (response) {
                $('#modalview').html(response.view)
                $('#modal-add-prov').modal('show');
            }
        });
      }

      function Edit(id) {
        $.ajax({
            url: "<?=base_url('admin/provinsi/edit')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                $('#modalview').html(response.view)
                $('#modal-edit-prov').modal('show');
            }
        });
      }

      function HapusProv(id) {
    //    return confirm('Apakah Yakin ?');
    
      $.ajax({
            type :"post",
            url: "<?=base_url('admin/hapus')?>",
            data: {id:id,table: "map_provinsi"},
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

<?= $this->endSection() ?>