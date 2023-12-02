<div class="modal fade" id="modal-add-kec" tabindex="-1" data-bs-backdrop="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Tambah Kecamatan</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-kecamatan" method="post">
    <?=csrf_field()?>
    <input type="hidden" name="kabupaten_id" value="<?=$kab['id']?>">
<div class="modal-body">
    <div class="alert alert-info">
        Kecamatan untuk Kabupaten (<?=$kab['kabupaten']?>)
    </div>
<div class="row g-3">
<div class="col-md-12">
<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Nama Kecamatan">
<div class="kecamatan text-danger"></div>
</div>
<div class="col-md-6">
    <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" required>
    <div class="lat invalid-feedback"></div>
</div>
<div class="col-md-6">
    <input type="text" class="form-control" name="long" id="long" placeholder="Longitude" required>
    <div class="long invalid-feedback"></div>
</div>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" id="btn-save" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
<script>
    $('#form-kecamatan').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/kecamatan/save')?>",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
            $('#btn-save').prop('disabled', true);
            $('#btn-save').html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
            },
            complete: function() {
            $('#btn-save').prop('disabled', false);
            $('#btn-save').html(`Save`);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.kecamatan) {
                        $('.kecamatan').html(response.error.kecamatan);
                    }else{
                        $('.kecamatan').html('');
                    }
                }
                if (response.res) {
                    alert('Berhasil Disimpan');
                    window.location.reload();
                }

            }
        });
        
    });
</script>
