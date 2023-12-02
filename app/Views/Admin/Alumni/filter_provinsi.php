<div class="table-responsive mt-3" >
<p>
   <div class="alert shadow-sm">
   Alumni Provinsi : <b><?=$prov['provinsi']?></b>
   </div>
</p>
<table class="table table-sm table-striped datatable">
<thead>
<tr>
<th scope="col">No.</th>
<th scope="col">Nama</th>
<th scope="col">JK</th>
<th scope="col">Tahun Lulus</th>
<th scope="col">Alamat</th>
<th scope="col"><i class="bi bi-gear"></i></th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach ($list as $r) {?>
<tr>
<th scope="row"><?=$i++?>.</th>
<td><?=$r['nama_alumni']?></td>
<td><?=$r['jk']?></td>
<td><?=$r['tahun_lulus']?></td>
<td><?=$r['alamat']?></td>
<td>
<a href="<?=base_url('admin/alumni/detail/'.$r['id'])?>" class="btn btn-info btn-sm"><i class="bi bi-search"></i> Detail</a>
<button type="button" onclick="Hapus(<?=$r['id']?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>