<?php
//   Author : Abdul Yamin
//   Email : ocikyamin@gmail.com
//   https://github.com/ocikyamin
namespace App\Models;

use CodeIgniter\Model;

class MMap extends Model
{
    protected $table            = 'map_provinsi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];


    public function CekLogin($email)
{
    return $this->db->table('users')->where('email',$email)->get()->getRow();
}

public function TampilData($table)
{
    return $this->db->table($table)->get()->getResultArray();
}

public function TampilBaris($table, $where)
{
    return $this->db->table($table)->where($where)->get()->getRowArray();
}

public function TampilDataId($table, $where)
{
    return $this->db->table($table)->where($where)->get()->getResultArray();
}

public function SimpanData($table,$data)
{
    return $this->db->table($table)->insert($data);
}

public function UpdateData($table,$data,$where)
{
    return $this->db->table($table)->set($data)->where($where)->update();
}

public function HapusData($table,$where)
{
    return $this->db->table($table)->where($where)->delete();
}


// Hitung Data 
public function JumlahData($table,$where)
{
    return $this->db->table($table)->where($where)->countAllResults();
    
}



}
