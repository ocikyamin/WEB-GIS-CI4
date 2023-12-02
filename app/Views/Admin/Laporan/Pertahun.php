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

<p>
    <h3>Alumni Tahun : <b><?=$tahun?></b></h3>
</p>
<table width="100%" border="1" cellpadding="3" style="border-collapse:collapse">
<thead>
<tr>
<th>No.</th>
<th>Nama</th>
<th>Tempat, Tgl. Lahir</th>
<th>JK</th>
<th>Telp</th>
<th>Tahun Lulus</th>
<th>Pendidikan Lanjutan</th>
<th>Status Nikah</th>
<th>Alamat</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach ($list as $r) {?>
<tr>
<th><?=$i++?>.</th>
<td><?=$r['nama_alumni']?></td>
<td><?=$r['tmp_lahir']?>, <?=date('d/F/Y', strtotime($r['tgl_lahir']))?></td>
<td><?=$r['jk']?></td>
<td><?=$r['telp']?></td>
<td><?=$r['tahun_lulus']?></td>
<td><?=$r['ppdk_lanjut']?></td>
<td><?=$r['stt_nikah']?></td>
<td><?=$r['alamat']?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<script>
    window.print();
</script>