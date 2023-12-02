

<?php
// var_dump($provinsi);

if (empty($persebaran_provinsi)) {
   ?>
   <div class="alert alert-danger">Tidak alumni untuk Provinsi ini</div>
   <?php
}else{
    ?>
    <div class="alert alert-info">Berikut persebaran alumni pada provinsi : <b><?=$provinsi['provinsi']?></b></div>
    <?php
}
?>

<div id="mapprov" class="card-body shadow-sm" style="width:100%;height:550px;border-radius:10px"></div>
<div class="mt-3 alert alert-default shadow-sm">
<div class="table-responsive mt-3">
            <table class="table table-sm table-striped datatable">
            <thead class="bg-dark text-white">
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">JK</th>
            <th scope="col">Tahun Lulus</th>
            <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach ($persebaran_provinsi as $r) {?>
            <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$r['nama_alumni']?></td>
            <td><?=$r['jk']?></td>
            <td><?=$r['tahun_lulus']?></td>
            <td>
              <a href="<?=base_url('alumni/detail/'.$r['id'])?>" class="btn btn-info btn-sm"><i class="bi bi-search"></i> Detail</a>
            </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
</div>

<script>
var mapProvinsi = L.map('mapprov').setView([<?=$provinsi['latitude']?>,<?=$provinsi['longitude']?>], 5.18);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapProvinsi);

var iconAlumni = L.icon({
    iconUrl: "<?=base_url('template/icon/alumni.png')?>",
    iconSize:     [38, 38], // size of the icon
});

<?php
foreach ($persebaran_provinsi as $p) {?>

L.marker([<?=$p['latitude']?>,<?=$p['longitude']?>], {icon: iconAlumni}).addTo(mapProvinsi)
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

</script>