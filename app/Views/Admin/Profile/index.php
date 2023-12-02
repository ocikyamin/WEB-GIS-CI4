<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>

<div class="pagetitle">
<h1>Profile</h1>
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
<li class="breadcrumb-item active">My Profile</li>
</ol>
</nav>
</div><!-- End Page Title -->

<section class="section dashboard">
<div class="row">
    <div class="col-lg-5">
        <div class="card">
        <div class="card-header">Update Profile</div>
                <div class="card-body">
                        <form id="update-profile" method="post">
                        <input type="hidden" name="id" value='<?=$user['id']?>'>
                        <input type="hidden" name="old_email" value='<?=$user['email']?>'>
                    <?=csrf_field()?>
                                <div class="form-group row mt-3">
                                    <label class="col-lg-3">Nama</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?=$user['nama']?>" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-lg-3">Email</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="email" id="email" class="form-control" value="<?=$user['email']?>" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-lg-3"></label>
                                    <div class="col-lg-9">
                                        <button type="submit" id="btn-update" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Update</button>
                                        <!-- <a class="btn btn-warning"><i class="bi bi-key"></i> Ganti Password</a> -->
                                    </div>
                                </div>
                        </form>
                </div>
        </div>
    </div> 
    <!-- col-5  -->
<div class="col-lg-7">
<form id="update-password" method="post">
<input type="hidden" name="id" value='<?=$user['id']?>'>
<input type="hidden" name="db_pass" value='<?=$user['password']?>'>
<?=csrf_field()?>
<div class="form-group row mt-3">
    <label class="col-lg-3">Password Lama</label>
    <div class="col-lg-9">
    <div class="input-group has-validation">
        <input type="text" name="old_pass" id="old_pass" class="form-control" placeholder="Password Lama">
        <div class="errold_pass invalid-feedback"></div>
</div>
    </div>
</div>
<div class="form-group row mt-3">
    <label class="col-lg-3">Password Baru</label>
    <div class="col-lg-9">
        <input type="text" name="new_pass" id="new_pass" class="form-control" placeholder="Password Baru">
    </div>
</div>
<div class="form-group row mt-3">
    <label class="col-lg-3">Konfirmasi Password</label>
    <div class="col-lg-9">
        <input type="text" name="conf_pass" id="conf_pass" class="form-control" placeholder="Konfirmasi Password">
    </div>
</div>


<div class="form-group row mt-3">
    <label class="col-lg-3"></label>
    <div class="col-lg-9">
        <button type="submit" id="btn-pass" class="btn btn-warning"><i class="bi bi-key"></i> Ganti Password</button>
    </div>
</div>
</form>
</div>
</div>
</section>

<script>
    $('#update-profile').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/profile')?>",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
            $('#btn-update').prop('disabled', true);
            $('#btn-update').html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
            },
            complete: function() {
            $('#btn-update').prop('disabled', false);
            $('#btn-update').html(`<i class="bi bi-pencil-square"></i> Update`);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.nama) {
                        $('.nama').html(response.error.nama);
                    }else{
                        $('.nama').html('');
                    }
                    if (response.error.email) {
                        $('.email').html(response.error.email);
                    }else{
                        $('.email').html('');
                    }
                }
                if (response.res) {
                    alert('Profile Diperbarui.');
                    window.location.reload();
                }

            }
        });
        
    });


    $('#update-password').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/profile/password')?>",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
            $('#btn-pass').prop('disabled', true);
            $('#btn-pass').html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
            },
            complete: function() {
            $('#btn-pass').prop('disabled', false);
            $('#btn-pass').html(`<i class="bi bi-key"></i> Ganti Password`);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.old_pass) {
                   
                        alert(response.error.old_pass)
                    }
                    if (response.error.new_pass) {
                        alert(response.error.new_pass);
                    }
                    if (response.error.conf_pass) {
                        alert(response.error.conf_pass);
                    }
                }
                if (response.res) {
                    alert('Pasword Diperbarui.');
                    window.location.reload();
                }

            }
        });
        
    });
</script>
<?= $this->endSection() ?>