<div class="modal fade" id="modal-edit" tabindex="-1" data-bs-backdrop="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Pekerjaan</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-pekerjaan" method="post">
    <input type="hidden" name="id" value='<?=$pkj['id']?>'>
    <input type="hidden" name="old_pkj" value='<?=$pkj['pekerjaan']?>'>
<?=csrf_field()?>
<div class="modal-body">
<div class="row g-3">
<div class="col-md-12">
<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?=$pkj['pekerjaan']?>" placeholder="Nama pekerjaan">
<div class="pekerjaan text-danger"></div>
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
    $('#form-pekerjaan').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/pekerjaan/update')?>",
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
                    if (response.error.pekerjaan) {
                        $('.pekerjaan').html(response.error.pekerjaan);
                    }else{
                        $('.pekerjaan').html('');
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
