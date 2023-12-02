<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Wilayah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Kabupaten</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Daftar Kabupaten Provinsi : <b><?=$prov['provinsi']?></b></h5>
        <p>
        <a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        <button type="button" onclick="Add(<?=$prov['id']?>)" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Tambah Kabupaten</button>
        </p>
        <!-- Table with stripped rows -->
        <div class="table-responsive">
            <table class="table table-sm table-striped">
            <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Kabupaten</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col"><i class="bi bi-gear"></i></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach ($kab as $r) {?>
            <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$r['kabupaten']?></td>
            <td><?=$r['latitude']?></td>
            <td><?=$r['longitude']?></td>
            <td>
            <a href="<?=base_url('admin/wilayah/kabupaten/'.$r['id'])?>" class="btn btn-secondary btn-sm"><i class="bi bi-gear"></i> Kecamatan</a>
            <button type="button" onclick="Edit(<?=$r['id']?>)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
            <button type="button" onclick="HapusKab(<?=$r['id']?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
    function Add(id) {
        $.ajax({
            url: "<?=base_url('admin/kabupaten/add')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                $('#modalview').html(response.view)
                $('#modal-add-kab').modal('show');
            }
        });
      }

      function Edit(id) {
        $.ajax({
            url: "<?=base_url('admin/kabupaten/edit')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                $('#modalview').html(response.view)
                $('#modal-edit-kab').modal('show');
            }
        });
      }


      function HapusKab(id) {
    
      $.ajax({
            type :"post",
            url: "<?=base_url('admin/hapus')?>",
            data: {id:id,table: "map_kabupaten"},
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