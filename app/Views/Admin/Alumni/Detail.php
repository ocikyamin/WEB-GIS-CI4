<?= $this->extend('Admin/Layout') ?>
<?= $this->section('content') ?>
<div class="pagetitle">
      <h1>Detail Alumni</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Alumni</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">

<div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 text-center">
              <img src="<?=base_url('gambar/'.$data['gambar'])?>" alt="Profile" class="rounded-circle" width="100" height="100">
              <h2><?=$data['nama_alumni']?></h2>
              <h3><?=$data['nisn']?></h3>
              <p>
              <a href="<?=base_url('admin/alumni/print/'.$data['id'])?>" target="_blank" class="btn btn-primary btn-sm"><i class="bi bi-printer"></i> Cetak</a>
              </p>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
                <table>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?=$data['nisn']?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?=$data['nama_alumni']?></td>
                    </tr>
                    <tr>
                        <td>Tempat & Tgl Lahir</td>
                        <td>:</td>
                        <td><?=$data['tmp_lahir']?>, <?=date('d/m/Y', strtotime($data['tgl_lahir']))?></td>
                    </tr>
                    <tr>
                        <td>Jk</td>
                        <td>:</td>
                        <td><?=$data['jk']?></td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td><?=$data['telp']?></td>
                    </tr>
                    <tr>
                        <td>Tahun Lulus</td>
                        <td>:</td>
                        <td><?=$data['tahun_lulus']?></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Lanjutan</td>
                        <td>:</td>
                        <td><?=$data['ppdk_lanjut']?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?=empty($pekerjaan)? "-": $pekerjaan['pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Mulai Bekerja</td>
                        <td>:</td>
                        <td><?=$data['tgl_kerja']?></td>
                    </tr>
                    <tr>
                        <td>Nama PT/Lembaga Tempat Bekerja</td>
                        <td>:</td>
                        <td><?=$data['nm_tmp_kerja']?></td>
                    </tr>
                    <tr>
                        <td>Penghasilan</td>
                        <td>:</td>
                        <td><?=$data['penghasilan_kerja']?></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td><?=$data['provinsi']?></td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>:</td>
                        <td><?=$data['kabupaten']?></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td><?=$data['kecamatan']?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?=$data['alamat']?></td>
                    </tr>
                    <tr>
                        <td>Lat</td>
                        <td>:</td>
                        <td><?=$data['latitude']?></td>
                    </tr>
                    <tr>
                        <td>Long</td>
                        <td>:</td>
                        <td><?=$data['longitude']?></td>
                    </tr>
                </table>
                <?php
// var_dump($pekerjaan);
                ?>


            </div>
          </div>

        </div>
      </div>

</section>


<?= $this->endSection() ?>