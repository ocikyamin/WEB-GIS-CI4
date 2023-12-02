<?php
function con()
{
return $db= \Config\Database::connect(); 
}

// Data Login Admin
function AdminLogin()
{
return $builder = con()
->table('users')
->where('id',session('user_ses'))
->get()
->getRow();
}


function ListTahun()
{
return $builder = con()
->table('tb_alumni')
->select('tahun_lulus')
->groupBy('tahun_lulus')
->get()
->getResultArray();
}


function CountData($type)
{
if ($type=="jml_alumni") {
return $builder = con()
->table('tb_alumni')
->countAllResults();
}

if ($type=="jml_alumni_L") {
return $builder = con()
->table('tb_alumni')
->where('jk','L')
->countAllResults();
}

if ($type=="jml_alumni_P") {
return $builder = con()
->table('tb_alumni')
->where('jk','P')
->countAllResults();
}

if ($type=="jml_prov") {
return $builder = con()
->table('map_provinsi')
->countAllResults();
}

if ($type=="jml_kab") {
return $builder = con()
->table('map_kabupaten')
->countAllResults();
}
if ($type=="jml_kec") {
return $builder = con()
->table('map_kecamatan')
->countAllResults();
}









}




