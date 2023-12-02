<?php
//   Author : Abdul Yamin
//   Email : ocikyamin@gmail.com
//   https://github.com/ocikyamin
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MMap;
use App\Models\MAlumni;

class Laporan extends BaseController
{
    protected $helpers = ['custom'];
    function __construct()
    {
    $this->MMap = new MMap;
    $this->MAlumni = new MAlumni;
    }
    public function index()
    {
        $data = [
            'prov'=> $this->MMap->TampilData('map_provinsi'),
            'kab'=> $this->MMap->TampilData('map_kabupaten')
        ];
        return view('Admin/Laporan/index', $data);
    }


    public function Pertahun($tahun)
    {
        $where = ['tahun_lulus'=> $tahun];
        $data = [
            'tahun'=> $tahun,
            'list'=> $this->MAlumni->filter('tahun',$where)];
        return view('Admin/Laporan/Pertahun', $data);
    }

    public function Provinsi($prov)
    {

    $where = ['provinsi_id'=> $prov];
    $data = [
    'prov'=> $this->MMap->TampilBaris('map_provinsi', ['id'=>$prov]),
    'list'=> $this->MAlumni->filter('prov',$where)];
    return view('Admin/Laporan/Provinsi', $data);
    }


    public function Kabupaten($kab)
    {

    $where = ['kabupaten_id'=> $kab];
    $data = [
    'kab'=> $this->MMap->TampilBaris('map_kabupaten', ['id'=>$kab]),
    'list'=> $this->MAlumni->filter('kab',$where)];
    return view('Admin/Laporan/Kabupaten', $data);
    }


}
