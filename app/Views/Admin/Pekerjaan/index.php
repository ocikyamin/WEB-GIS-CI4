<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Pekerjaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Pekerjaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Daftar Pekerjaan</h5>
        <p>
        <a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        <button type="button" onclick="Add()" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Tambah</button>
        </p>
        <!-- Table with stripped rows -->
        <div class="table-responsive">
            <table class="table table-sm table-striped">
            <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Pekerjaan</th>
            <th scope="col"><i class="bi bi-gear"></i></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach ($pekerjaan as $r) {?>
            <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$r['pekerjaan']?></td>
            <td>
            <button type="button" onclick="Edit(<?=$r['id']?>)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
            <button type="button" onclick="HapusPkj(<?=$r['id']?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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

      function Edit(id) {
        $.ajax({
            url: "<?=base_url('admin/pekerjaan/edit')?>",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                $('#modalview').html(response.view)
                $('#modal-edit').modal('show');
            }
        });
      }


      function HapusPkj(id) {
    
      $.ajax({
            type :"post",
            url: "<?=base_url('admin/hapus')?>",
            data: {id:id,table: "tb_pekerjaan"},
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