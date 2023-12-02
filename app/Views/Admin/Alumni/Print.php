<style>
    body {
        font-family:arial;
    }
</style>
<p>
 <center>
 <img src="<?=base_url('logo.png')?>" alt="Profile" class="rounded-circle" width="100" height="100">
 <h3>
    SMP NEGERI 1 BUKITTINGGI <br>
    DATA ALUMNI
    </h3>
 </center>
</p>
<hr>
<table width="100%">
<tr>
    <td>NISN</td>
    <td>:</td>
    <td><?=$data['nisn']?></td>
    <td rowspan="6">
    <img src="<?=base_url('gambar/'.$data['gambar'])?>" alt="Profile" width="100" height="120">
    </td>
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
<hr>

<script>
    window.print();
</script>
