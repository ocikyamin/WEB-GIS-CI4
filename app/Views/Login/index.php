<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | GIS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?=base_url()?>template/assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url()?>template/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>template/assets/css/style.css" rel="stylesheet">
   <!-- ==
  Author : Abdul Yamin
  Email : ocikyamin@gmail.com
  https://github.com/ocikyamin
  === -->
</head>

<body>
  
  <main>
    <div class="container">
      
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <div class="text-center ">
                      <img src="<?=base_url('logo.png')?>" alt="Logo" width="100">
                        <!-- <h5>FORM LOGIN</h5> -->
                   <div>
                   SEKOLAH XYZ <br>
                   Sistem Informasi Sebaran Alumni
                   </div>
                    <div class="small">(Geographic Information System)</div>
                  </div>
                </div>
                <hr>
                
                <form id="login-form" class="row g-3">
                  <?=csrf_field()?>
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                        <div class="err-email invalid-feedback"></div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input type="text" name="password" class="form-control" id="password" placeholder="password">
                        <div class="err-password invalid-feedback"></div>
                      </div>
                    </div>
                    <div class="col-4">
                      <a href="<?=base_url()?>" class="btn btn-default w-100" type="submit"><i class="bi bi-house"></i> Home</a>
                    </div>
                    <div class="col-8">
                      <button id="btn-login" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
          </div>
        </div>
        
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>template/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <!-- <script src="<?=base_url()?>template/assets/js/main.js"></script> -->
  <script src="<?=base_url()?>template/assets/js/jquery.js"></script>
  <script>
$('#login-form').submit(function (e) { 
e.preventDefault();
$.ajax({
type: "post",
url: "<?=base_url('login')?>",
data: $(this).serialize(),
dataType: "json",
beforeSend: function() {
$('#btn-login').prop('disabled', true);
$('#btn-login').html(
`<div class="spinner-border spinner-border-sm" role="status">
  <span class="visually-hidden">Loading...</span>
</div>`
);
},
complete: function() {
$('#btn-login').prop('disabled', false);
$('#btn-login').html(`Login`);
},
success: function (response) {
if (response.error) {
if (response.error.email) {
$('#email').addClass('is-invalid');
$('.err-email').html(response.error.email);
}else{
$('#email').removeClass('is-invalid');
$('#email').addClass('is-valid');
}

if (response.error.password) {
$('#password').addClass('is-invalid');
$('.err-password').html(response.error.password);
}else{
$('#password').removeClass('is-invalid');
$('#password').addClass('is-valid');
}
}

if (response.sukses) {
window.location=response.link
}

}
});

});
</script>
  
</body>

</html>