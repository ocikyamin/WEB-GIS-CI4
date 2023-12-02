<div class="modal fade" id="modal-edit-prov" tabindex="-1" data-bs-backdrop="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Provinsi</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-provinsi" method="post">
<?=csrf_field()?>
<input type="hidden" name="id" value="<?=$prov['id']?>">
<input type="hidden" name="old_prov" value="<?=$prov['provinsi']?>">
<div class="modal-body">
<div class="row g-3">
<div class="col-md-12">
<input type="text" class="form-control" name="provinsi" id="provinsi" value="<?=$prov['provinsi']?>" placeholder="Nama Provinsi">
<div class="provinsi text-danger"></div>
</div>
<div class="col-md-6">
    <input type="text" class="form-control" name="lat" id="lat" value="<?=$prov['latitude']?>" placeholder="Latitude" required>
    <div class="lat invalid-feedback"></div>
</div>
<div class="col-md-6">
    <input type="text" class="form-control" name="long" id="long" value="<?=$prov['longitude']?>" placeholder="Longitude" required>
    <div class="long invalid-feedback"></div>
</div>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" id="btn-edit" class="btn btn-primary">Edit</button>
</div>
</form>
</div>
</div>
</div>
<script>
    $('#form-provinsi').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/provinsi/edit')?>",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
            $('#btn-edit').prop('disabled', true);
            $('#btn-edit').html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
            },
            complete: function() {
            $('#btn-edit').prop('disabled', false);
            $('#btn-edit').html(`edit`);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.provinsi) {
                        $('.provinsi').html(response.error.provinsi);
                    }else{
                        $('.provinsi').html('');
                    }
                }
                if (response.res) {
                    alert('Berhasil Diperbarui');
                    window.location.reload();
                }

            }
        });
        
    });
</script>
