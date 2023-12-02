<div class="modal fade" id="modal-edit-kab" tabindex="-1" data-bs-backdrop="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Kabupaten</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-kabupaten" method="post">
    <?=csrf_field()?>
    <input type="hidden" name="id" value="<?=$kab['id']?>">
    <input type="hidden" name="old_kab" value="<?=$kab['kabupaten']?>">
<div class="modal-body">
<div class="row g-3">
<div class="col-md-12">
<input type="text" class="form-control" name="kabupaten" id="kabupaten" value="<?=$kab['kabupaten']?>" placeholder="Nama kabupaten">
<div class="kabupaten text-danger"></div>
</div>
<div class="col-md-6">
    <input type="text" class="form-control" name="lat" id="lat" value="<?=$kab['latitude']?>" placeholder="Latitude" required>
    <div class="lat invalid-feedback"></div>
</div>
<div class="col-md-6">
    <input type="text" class="form-control" name="long" id="long" value="<?=$kab['longitude']?>" placeholder="Longitude" required>
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
    $('#form-kabupaten').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/kabupaten/edit')?>",
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
                    if (response.error.kabupaten) {
                        $('.kabupaten').html(response.error.kabupaten);
                    }else{
                        $('.kabupaten').html('');
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
