<?php
//   Author : Abdul Yamin
//   Email : ocikyamin@gmail.com
//   https://github.com/ocikyamin
namespace App\Models;

use CodeIgniter\Model;

class MAlumni extends Model
{
    protected $table            = 'tb_alumni';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function DetailAlumni($id=null)
    {
        return $this->db->table('tb_alumni')
        ->select('tb_alumni.*,
        map_provinsi.provinsi,
        map_kabupaten.kabupaten,
        map_kecamatan.kecamatan
        ')
        ->join('map_provinsi','tb_alumni.provinsi_id=map_provinsi.id','left')
        ->join('map_kabupaten','tb_alumni.kabupaten_id=map_kabupaten.id','left')
        ->join('map_kecamatan','tb_alumni.kecamatan_id=map_kecamatan.id','left')
        ->where('tb_alumni.id',$id)
        ->get()->getRowArray();
        // return $this->db->table('tb_alumni')
        // ->select('tb_alumni.*,
        // map_provinsi.provinsi,
        // map_kabupaten.kabupaten,
        // map_kecamatan.kecamatan
        // ')
        // ->join('map_provinsi','tb_alumni.provinsi_id=map_provinsi.id')
        // ->join('map_kabupaten','tb_alumni.kabupaten_id=map_kabupaten.id')
        // ->join('map_kecamatan','tb_alumni.kecamatan_id=map_kecamatan.id')
        // ->where('tb_alumni.id',$id)
        // ->get()->getRowArray();
    }



    public function PersebaranAll()
    {
        return $this->db->table('tb_alumni')
        ->select('id,nama_alumni,tahun_lulus,alamat,latitude,longitude,gambar')
        ->get()->getResultArray();
    }

    public function filter($type,$where)
    {
        if ($type=="tahun") {
            return $this->db->table('tb_alumni')
        ->select('*')
        ->where($where)
        ->get()->getResultArray();
        }

        if ($type=="prov") {
            return $this->db->table('tb_alumni')
        ->select('*')
        ->where($where)
        ->get()->getResultArray();
        }

        if ($type=="pekerjaan") {
            return $this->db->table('tb_alumni')
        ->select('*')
        ->where($where)
        ->get()->getResultArray();
        }

        if ($type=="kab") {
            return $this->db->table('tb_alumni')
        ->select('*')
        ->where($where)
        ->get()->getResultArray();
        }

        
    }



}
