<?= $this->extend('Home/Layouts') ?>
<?= $this->section('content') ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>
            Persebaran Alumni <br>
            <small>Geographic Information System</small></h1>
          <h2>NAMA SEKOLAH XYZ</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="<?=base_url('daftar')?>" class="btn-get-started scrollto">Daftar Alumni</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Peta Sebaran Alumni</h2>
        <div class="row">
        <div class="col-lg-9">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-resvonsive" id="area-peta">
                    <div id="map" class="card-body shadow-sm" style="width:100%;height:550px;border-radius:10px"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
        <div class="card shadow-sm">
                <div class="card-body">
                <select class="form-select" id="filter_provinsi">
                  <option value="">Tampilkan By Provinsi</option>
                  <?php
                  foreach ($provinsi as $p) :?>
                  <option value="<?=$p['id']?>"><?=$p['provinsi']?></option>
                  <?php endforeach;?>
                  <option value="">Tampilkan Semua</option>
                  </select>
            </div>
        </div>
        <div class="mt-3" id="area-tabel">

          <div class="card bg-primary shadow-sm">
            <div class="card-body text-white">
                  Jumlah Alumni
                  <div>
                    <h3><?=CountData('jml_alumni')?></h3>
                  </div>
            </div>
          </div>

          <div class="card bg-dark shadow-sm mt-2">
            <div class="card-body text-white">
                  Jumlah Laki-laki
                  <div>
                    <h3><?=CountData('jml_alumni_L')?></h3>
                  </div>
            </div>
          </div>

          <div class="card bg-warning shadow-sm mt-2">
            <div class="card-body text-white">
                  Perempuan
                  <div>
                    <h3><?=CountData('jml_alumni_P')?></h3>
                  </div>
            </div>
          </div>



        </div>
        </div>
      



      </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>
            VISI <br>
             Nama Sekolah XYZ</h3>
          <p> <em>
           
          “  Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus id doloribus debitis“
          </em></p>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Video Section ======= -->
    <section id="about-video" class="about-video">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="fade-right" data-aos-delay="100">
            <img src="<?=base_url()?>template/img/tendik.png" class="img-fluid" alt="">
            <a href="https://youtu.be/OrpGe2C141A" class="glightbox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Sambutan Kepala Sekolah Nama Sekolah XYZ</h3>
            <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam animi consequatur unde, non, fuga neque repellendus sint quaerat temporibus odio aspernatur mollitia magni eos. Molestiae velit quaerat nisi. Dolores, praesentium.
            </p>
            <p>
            <a href="#" target="_blank" class="btn btn-primary">Lihat Profil Lengkap</a>
            </p>
            
          </div>

        </div>

      </div>
    </section><!-- End About Video Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>
            Apa kata mereka tentang Sekolah XYZ
          </p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper-wrapper">
                      <?php
                      foreach ($testimonial as $t) {?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                              <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?=$t['testimoni']?>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                              <img src="<?=base_url()?>template/img/tes.jpg" class="testimonial-img" alt="">
                              <h3><?=$t['nama']?></h3>
                              <h4><?=$t['perkerjaan']?></h4>
                            </div>
                      </div><!-- End testimonial item -->
                      <?php } ?>
                    </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
        </div>

        <div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4400462609887!2d100.37099038132324!3d-0.30930116332419577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd538bb9e392ac7%3A0xef605e97b4919060!2sSMP%20Negeri%201%20Bukittinggi!5e0!3m2!1sid!2sid!4v1679239450143!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Alamat:</h4>
                <p>Jl. Kenangan no 1993. Bersama Kita Teguh</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>sekolah@xyz.com </p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>0822-1460 </p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="alert alert-info">
              Yuk, kirim testimoni untuk Sekolah XYZ
            </div>

            <form  method="post" id="form-testimoni">
              <div class="row gy-2 gx-md-3">
                <div class="col-md-12 form-group">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group col-12">
                  <input type="text" class="form-control" name="perkerjaan" id="subject" placeholder="Pekerjaan / Jabatan" required>
                </div>
                <div class="form-group col-12">
                  <textarea class="form-control" name="testimoni" rows="5" placeholder="Testimoni" required></textarea>
                </div>
                <div class="text-center col-12"><button id="btn-test" class="btn btn-primary" type="submit">Kirim</button></div>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  <script>
var map = L.map('map').setView([-0.6377214,111.5907425], 5.15);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var iconAlumni = L.icon({
    iconUrl: "<?=base_url('template/icon/alumni.png')?>",
    iconSize:     [38, 38], // size of the icon
});

<?php
foreach ($persebaran as $p) {?>

L.marker([<?=$p['latitude']?>,<?=$p['longitude']?>], {icon: iconAlumni}).addTo(map)
    .bindPopup(`
    <p>
    INFORMASI ALUMNI
    </p>
    <table width="100%" class="table table-sm table-striped">
    <tr>
    <td>Nama Alumni</td>
    <td>:</td>
    <td><?=$p['nama_alumni']?></td>
    </tr>

    <tr>
    <td>Tahun Lulus</td>
    <td>:</td>
    <td><?=$p['tahun_lulus']?></td>
    </tr>

    <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?=$p['alamat']?></td>
    </tr>

    <tr>
    <td colspan="3"><img src="<?=base_url('gambar/'.$p['gambar'])?>" class="img-thumbnail"></td>
    </tr>
    <tr>
    <td colspan="3" align="center">
    <a href="<?=base_url('alumni/detail/'.$p['id'])?>" class="btn btn-dark btn-sm"><i class="bi bi-search"></i> Lihat Detail</a>
    </td>
    </tr>

    </table>
   
    
    `);

    <?php } ?>


    $('#form-testimoni').submit(function (e) { 
    e.preventDefault();
    $.ajax({
    type: "post",
    url: "<?=base_url('testimoni')?>",
    data: $(this).serialize(),
    dataType: "json",
    beforeSend: function() {
    $('#btn-test').prop('disabled', true);
    $('#btn-test').html(
    `<div class="spinner-border spinner-border-sm" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>`
    );
    },
    complete: function() {
    $('#btn-test').prop('disabled', false);
    $('#btn-test').html(`Kirim`);
    },
    success: function (response) {
        if (response.sukses) {
          alert('Terimakasih ! Testimoni akan ditinjau oleh admin, selajutnya akan ditampilkan jika memenuhi syarat')
          window.location.reload()
        }
    }
    });

    });


    // filter_provinsi
    $('#filter_provinsi').change(function (e) { 
      e.preventDefault();
      if ($(this).val() =="") {
        // alert('kosong')
        window.location.reload()
      }else{
        // alert('adaaa')
        $.ajax({
          url: "<?=base_url('map/prov')?>",
          data: {id:$(this).val()},
          dataType: "json",
          success: function (response) {
            // alert(response.ok)
            $('#area-peta').html(response.view)
            $('#area-tabel').html(response.tabel)
          }
        });
      }
      
    });
</script>

  <?= $this->endSection() ?>