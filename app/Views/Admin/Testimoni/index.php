<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Testimoni</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Testimoni</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Daftar Testimoni</h5>
        <p>
        <a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        </p>
        <!-- Table with stripped rows -->
        <div class="table-responsive">
            <table class="table table-sm table-striped">
            <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Pekerjaan</th>
            <th scope="col">Testimoni</th>
            <th scope="col">Status</th>
            <th scope="col"><i class="bi bi-list"></i></th>

            <th scope="col"><i class="bi bi-gear"></i></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach ($testimoni as $r) {?>
            <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$r['nama']?></td>
            <td><?=$r['perkerjaan']?></td>
            <td><?=$r['testimoni']?></td>
            <td><?=$r['status_publish']==1 ? '<span class="badge bg-success">Ditampilkan</span>': '<span class="badge bg-danger">Tidak Ditampilkan</span>'?></td>
            <td>
                <div class="form-check form-switch">
  <input class="form-check-input" onclick="Switch(<?=$r['id']?>,<?=$r['status_publish']?>)" <?=$r['status_publish']==1? "checked":null?> type="checkbox" role="switch" id="id-<?=$r['id']?>">
  <label class="form-check-label" for="id-<?=$r['id']?>"></label>
</div></td>
            <td><button type="button" onclick="HapusTestimoni(<?=$r['id']?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
            url: "<?=base_url('admin/pekerjaan/add')?>",
            data: "data",
            dataType: "json",
            success: function (response) {
                $('#modalview').html(response.view)
                $('#modal-add').modal('show');
            }
        });
      }

      function Switch(id,status) {
        $.ajax({
            url: "<?=base_url('admin/testimoni/edit')?>",
            data: {id:id,status:status},
            dataType: "json",
            success: function (response) {
                alert('Berhasil Diperbrui');
                    window.location.reload();
            }
        });
      }


      function HapusTestimoni(id) {
    
      $.ajax({
            type :"post",
            url: "<?=base_url('admin/hapus')?>",
            data: {id:id,table: "testimoni"},
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