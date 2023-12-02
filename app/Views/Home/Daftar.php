<?= $this->extend('Home/Layouts') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?=base_url()?>template/sweetalert2/dist/sweetalert2.min.css" />
<script src="<?=base_url()?>template/sweetalert2/dist/sweetalert2.min.js"></script>
<main id="main mt-3">
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Daftar Alumni</h2>
      <ol>
        <li><a href="./">Home</a></li>
        <li>Daftar Alumni</li>
      </ol>
    </div>
    

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page mb-3">
  <div class="container">

    <div class="row gy-2 gx-md-3">
    <div class="col-lg-1"></div>
        <div class="col-lg-10">
        <div class="alert alert-info">
                    Silahkan mengisi data alumni, dengan adanya penelusuran alumni ini para alumni bisa mencari teman-teman sekolah dulu. Jika anda sudah mengisi data sebagai alumni SMPN 1 BUKITTINGGI, maka data anda akan kami simpan di database kami, bagian publishing website akan mempublish data anda.
                    </div>
            <div class="card shadow">
                <div class="card-body">
                    
                    <form method="post" enctype="multipart/form-data" id="form-alumni">                   

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="nisn">NISN / NIS<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="nisn" id="nisn" class="form-control form-control-sm" placeholder="Nomor Induk Siswa Nasional">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="nama_alumni">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="nama_alumni" id="nama_alumni" class="form-control form-control-sm" placeholder="Contoh : Intan Sanjaya">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="tmp_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control form-control-sm" placeholder="Contoh : Padang">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="jk">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                        <select name="jk" id="jk" class="form-control form-control-sm">
                                <option value="">Gender</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="telp">No.Telp / HP <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="telp" id="telp" class="form-control form-control-sm" placeholder="Ex : 0822xxxxxxxx">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="tahun_lulus">Tahun Lulus <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control form-control-sm" placeholder="Ex : 2013">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="ppdk_lanjut">Melanjutkan Penddidikan di <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ppdk_lanjut" id="ppdk_lanjut" class="form-control form-control-sm" placeholder="Ex : SMKN 1 BUKTTINGGI">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="stt_nikah">Status Nikah<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="stt_nikah" id="stt_nikah" class="form-control form-control-sm">
                                <option value="">Plih Status</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="status_kerja">Status Pekerjaan <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <div class="form-check form-switch">
                            <input class="form-check-input" name="status_kerja" type="checkbox" role="switch" id="status_kerja">
                            <label class="form-check-label" for="status_kerja">Bekerja ?</label>
                            </div>
                 
                        </div>
                    </div>
                    <div id="ket_pekerjaan"></div>                    

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="provinsi">Provinsi<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="provinsi" id="provinsi" class="form-control form-control-sm">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                foreach ($prov as $d) {?>
                                 <option value="<?=$d['id']?>"><?=$d['provinsi']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="kabupaten">Kabupaten<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="kabupaten" id="kabupaten" class="form-control form-control-sm" disabled>
                            <option value="">Pilih Kabupaten</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3" for="kecamatan">Kecamatan<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="kecamatan" id="kecamatan" class="form-control form-control-sm" disabled>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row mb-2">
                        <label class="col-lg-12" for="lokasi">Lokasi Tempat Tinggal<span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <div class="alert alert-info">
                                <li>Geser titik lokasi jika lokasi tempat tinggal anda tidak berada di posisi sekarang !</li>
                                <li>Jika Titik lokasi tidak tampil atau tidak bisa digeser, Mohon isi kolom Latitude dan Longitude secara mandiri. <a href="https://www.google.co.id/maps/" target="_blank">Buka Google Map</a> Untuk melihat lokasi anda</li>
                                    
                            </div>
                            <div id="lokasi_alumni" class="card-body shadow-sm" style="width:100%;height:450px;border-radius:10px">
                                    
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-2 mt-3">
                        <label class="col-lg-3" for="latitude">latitude<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="latitude" id="latitude" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-3">
                        <label class="col-lg-3" for="longitude">longitude<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="longitude" id="longitude" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-3">
                        <label class="col-lg-3" for="longitude">Alamat<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <textarea name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat Lengkap"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-3">
                        <label class="col-lg-3" for="longitude">Foto</label>
                        <div class="col-lg-4">
                            <input type="file" name="filenya" id="filenya" class="form-control form-control-sm">
                            <div>
                            Extensi yang dizinkan <b>png,jpg,jpeg</b> maksimal <b>2048</b> kb
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-2 mt-3">
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                <p>
                                   Saya setuju bahwa Benar di atas adalah identitas asli dan valid !
                                </p>
                                <div class="form-check">
                                <input class="form-check-input" name="is_confirm" type="checkbox" value="1" id="is_confirm">
                                <label class="form-check-label" for="is_confirm">
                                Saya Setuju
                                </label>
                                </div>
                                <button type="submit" id="btn-daftar" class="btn btn-primary mt-2">Submit</button>

                            </div>
                        </div>
                    </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
  </div>
</section>

</main><!-- End #main -->

<script>

var lokasiMAP = L.map('lokasi_alumni').setView([4.1813244,106.8194606], 5);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; OpenStreetMap contributors'
}).addTo(lokasiMAP);

navigator.geolocation.getCurrentPosition(function(position) {
   var latlng = L.latLng(position.coords.latitude, position.coords.longitude);
   var marker = L.marker(latlng, { draggable: true }).addTo(lokasiMAP);
   lokasiMAP.setView(latlng, 5);
  

   console.log("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);

   $('#latitude').val(position.coords.latitude)
$('#longitude').val(position.coords.longitude)

   marker.on('dragend', function(event) {
	var markerLatLng = marker.getLatLng();
	var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + markerLatLng.lat + '&lon=' + markerLatLng.lng;
	fetch(url)
	.then(response => response.json())
	.then(data => {
		var popupContent = '<b>' + data.display_name + '</b><br>Latitude: ' + markerLatLng.lat + '<br>Longitude: ' + markerLatLng.lng;
		marker.bindPopup(popupContent).openPopup();

		console.log('Nama: ' + data.display_name);
		console.log('Latitude: ' + markerLatLng.lat + ', Longitude: ' + markerLatLng.lng);
        
        $('#latitude').val(markerLatLng.lat)
        $('#longitude').val(markerLatLng.lng)
        $('#alamat').val(data.display_name)

	})
	.catch(error => {
		console.error('Error:', error);
	});
	

   });
});


// Tampilkan Kabupten Provinsi 

$('#provinsi').change(function (e) { 
    e.preventDefault();
    if ($(this).val()=="") {
        $('#kabupaten').html(`<option value="">Pilih Kabupaten</option>`);
        $('#kabupaten').prop('disabled', true);
    }else{
        $.ajax({
        type: "post",
        url: "<?=base_url('wilayah/kab')?>",
        data: {id:$(this).val()},
        dataType: "json",
        success: function (response) {
            console.log(response)
            $('#kabupaten').html(response.kab);
            $('#kabupaten').removeAttr('disabled');
           
        }
    });
    }
   
    
});
$('#kabupaten').change(function (e) { 
    e.preventDefault();
    if ($(this).val()=="") {
        $('#kecamatan').html(`<option value="">Pilih Kecamatan</option>`);
        $('#kecamatan').prop('disabled', true);
    }else{
        $.ajax({
        type: "post",
        url: "<?=base_url('wilayah/kec')?>",
        data: {id:$(this).val()},
        dataType: "json",
        success: function (response) {
            $('#kecamatan').html(response.kab)
            $('#kecamatan').removeAttr('disabled');
        }
    });
    }
    
});

// Status Pekerjaan 
$("#status_kerja").click(function() {
if ($(this).prop("checked")) {
$("#ket_pekerjaan").html(`
<div class="bg-primary p-3 mb-3" style="border-radius:15px">
                    <p class="text-white">
                        Informasi Pekerjaan
                    
                    </p>
                    <hr>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3 text-white" for="pekerjaan_id">Pekerjaan Saat Ini</label>
                        <div class="col-lg-4">
                            <select name="pekerjaan_id" id="pekerjaan_id" class="form-control form-control-sm">
                                <option value="">Pilih Jenis Pekerjaan</option>
                                <?php
                                foreach ($pekerjaan as $d) {?>
                                 <option value="<?=$d['id']?>"><?=$d['pekerjaan']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3 text-white" for="tgl_kerja">Tanggal Mulai Bekerja</label>
                        <div class="col-lg-4">
                            <input type="date" name="tgl_kerja" id="tgl_kerja" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3 text-white" for="nm_tmp_kerja">Nama Perusahaan / Lembaga Tempat Bekerja</label>
                        <div class="col-lg-4">
                            <input type="text" name="nm_tmp_kerja" id="nm_tmp_kerja" class="form-control form-control-sm" placeholder="Ex : PT.Pertamina">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-lg-3 text-white" for="penghasilan_kerja">Penghasilan</label>
                        <div class="col-lg-4">
                            <input type="text" name="penghasilan_kerja" id="penghasilan_kerja" class="form-control form-control-sm" placeholder="Ex : 5.000.000">
                        </div>
                    </div>
                    </div>
`);
$("#ket_pekerjaan").show();
} else {
$("#ket_pekerjaan").html("");
$("#ket_pekerjaan").hide();
}
});



// Daftar Alumni 
$('#form-alumni').submit(function (e) { 
    e.preventDefault();
    let forms = $('#form-alumni')[0];
        let data = new FormData(forms);
    $.ajax({
        type: "post",
        url: "<?=base_url('daftar')?>",
        dataType: "json",
        data: data,
        enctype: 'multipart/form-data',
        processData : false,
        contentType: false,
        cache: false,
        beforeSend: function() {
$('#btn-daftar').prop('disabled', true);
$('#btn-daftar').html(
`<div class="spinner-border spinner-border-sm" role="status">
  <span class="visually-hidden">Loading...</span>
</div>`
);
},
complete: function() {
$('#btn-daftar').prop('disabled', false);
$('#btn-daftar').html(`Submit`);
},
success: function (response) {
    if (response.error) {

        if (response.error.nisn) {
        Swal.fire({
        icon: 'warning',
        title: 'Warning',
        text : response.error.nisn ,
        showConfirmButton: true,
        })
        }

        if (response.error.is_confirm) {
        Swal.fire({
        icon: 'warning',
        title: 'Warning',
        text : response.error.is_confirm ,
        showConfirmButton: true,
        })
        }

        if (response.error.filenya) {
        Swal.fire({
        icon: 'warning',
        title: 'Warning',
        text : response.error.filenya ,
        showConfirmButton: true,
        })
        }

}

if (response.sukses) {
Swal.fire({
icon: 'success',
title: 'Terimakasih',
text : 'Pendaftaran Alumni Selesai, Terimakasih Atas Partisipasinya.',
showConfirmButton: true,
}).then((result) => {
window.location='<?=base_url('/')?>';
})

}


            
        }
    });
    
});

</script>

  <?= $this->endSection() ?>