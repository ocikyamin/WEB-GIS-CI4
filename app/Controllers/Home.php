<?php
//   Author : Abdul Yamin
//   Email : ocikyamin@gmail.com
//   https://github.com/ocikyamin
namespace App\Controllers;
use App\Models\MMap;
use App\Models\MAlumni;

class Home extends BaseController
{
    protected $helpers = ['custom'];
    function __construct()
    {
    $this->MMap = new MMap;
    $this->MAlumni = new MAlumni;
    }
    public function index()
    {
        $where = ['status_publish'=>'1'];
        $data = [
        'persebaran'=> $this->MAlumni->PersebaranAll(),
        'provinsi'=> $this->MMap->TampilData('map_provinsi'),
        'testimonial' => $this->MMap->TampilDataId('testimoni', $where)
    ];
        return view('Home/Home', $data);
    }

    public function Daftar()
    {
        $data = [
            'prov'=> $this->MMap->TampilData('map_provinsi'),
            'pekerjaan'=> $this->MMap->TampilData('tb_pekerjaan')
        ];
        return view('Home/Daftar', $data);
    }

    // Wilayah 
    public function GetKabupaten()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $option = "";
            $kab= $this->MMap->TampilDataId('map_kabupaten', ['provinsi_id'=> $id]);
            if ($kab) {
                foreach ($kab as $d) {
                    $option .= '<option value="'.$d['id'].'">'.$d['kabupaten'].'</option>';
                 }
                 $msg = ['kab'=> '<option value="">Pilih Kabupaten</option>'.$option];
            }else{
                $msg = ['err'=> 404];
            }
            echo json_encode($msg);
        }
    }

    public function GetKecamatan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $option = "";
            $kab= $this->MMap->TampilDataId('map_kecamatan', ['kabupaten_id'=> $id]);

            foreach ($kab as $d) {
               $option .= '<option value="'.$d['id'].'">'.$d['kecamatan'].'</option>';
            }
            $msg = ['kab'=> '<option value="">Pilih Kecamatan</option>'.$option];
            echo json_encode($msg);
        }
    }

    public function ProsesDaftar()
    {
        if ($this->request->isAJAX()) {
            $this->validate= \Config\Services::validation();
            $validate = $this->validate(
            [
            'nisn' => [
            'label'  => 'NISN',
            'rules'  => 'required|is_unique[tb_alumni.nisn]|min_length[4]|max_length[11]',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'is_unique' => '{field} Telah Terdaftar',
            'min_length' => '{field} Minimal 4 Angka',
            'max_length' => '{field} Maksimal 11 Angka'
            ]
            ],
            'is_confirm' => [
                'label'  => 'Persetujuan',
                'rules'  => 'required',
                'errors' => [
                'required' => '{field} Harus di Konfirmasi'
                ]
                ]
                // ,
                // 'filenya'  => [
                // 'label'     => 'File',
                // 'rules'     => 'uploaded[filenya]|ext_in[filenya,png,jpg,jpeg]|max_size[filenya,2048]',
                // 'errors'    => [
                // 'uploaded'  => '{field} Harus di Isi',
                // 'max_size'  =>'{field} Maksimal 2048 kb',
                // 'ext_in'    => '{field} Extensi yang dizinkan png,jpg,jpeg'
                // ]

                // ] 
                          


            ]
            );
            if (!$validate) {
                $msg = [
                'error' => [
                'nisn' => $this->validate->getError('nisn'),
                'is_confirm' => $this->validate->getError('is_confirm')
                ]
                ];
            }else{
            $files         = $this->request->getFile('filenya');

            // Cek jika user tidak Upload gambar
            if ($files=="") {
            $set_file_name = 'default.png'; 
            }else{
                // Jika user upload gambar 
            $file_ext      = $files->getExtension();
            $newName       = $files->getRandomName();
            $set_file_name = $newName;  
            $path = ROOTPATH.'/gambar/'; 
            // pindahkan file pada folder 
            $files->move($path, $set_file_name);

            }



           

                $data =[
                'nisn'=> $this->request->getPost('nisn'),
                'nama_alumni'=> $this->request->getPost('nama_alumni'),
                'tmp_lahir'=> $this->request->getPost('tmp_lahir'),
                'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                'jk'=> $this->request->getPost('jk'),
                'telp'=> $this->request->getPost('telp'),
                'tahun_lulus'=> $this->request->getPost('tahun_lulus'),
                'ppdk_lanjut'=> $this->request->getPost('ppdk_lanjut'),
                'stt_nikah'=> $this->request->getPost('stt_nikah'),
                'status_kerja'=> $this->request->getPost('status_kerja'),
                'pekerjaan_id'=> $this->request->getPost('pekerjaan_id'),
                'tgl_kerja'=> $this->request->getPost('tgl_kerja'),
                'nm_tmp_kerja'=> $this->request->getPost('nm_tmp_kerja'),
                'penghasilan_kerja'=> $this->request->getPost('penghasilan_kerja'),
                'provinsi_id'=> $this->request->getPost('provinsi'),
                'kabupaten_id'=> $this->request->getPost('kabupaten'),
                'kecamatan_id'=> $this->request->getPost('kecamatan'),
                'alamat'=> $this->request->getPost('alamat'),
                'latitude'=> $this->request->getPost('latitude'),
                'longitude'=> $this->request->getPost('longitude'),
                'gambar'=> $set_file_name
                ];

                $this->MAlumni->save($data);

                $msg = ['sukses'=> 200];


            }
            


            echo json_encode($msg);
        }
    }


    // SimpanTestimoni
    public function SimpanTestimoni()
    {
        if ($this->request->isAJAX()) {
        $data = [
        'nama'=>$this->request->getPost('nama'),
        'perkerjaan'=>$this->request->getPost('perkerjaan'),
        'testimoni'=>$this->request->getPost('testimoni')
        ];
        $insert=  $this->MMap->SimpanData('testimoni',$data);
        $msg = ['sukses'=> true];
        echo json_encode($msg);
        }
    }


    // FilterProvinsi

    public function FilterProvinsi()
    {
       if ($this->request->isAJAX()) {
        $id = $this->request->getVar('id');
        $where = ['provinsi_id'=>$id];
        $data = [
        'persebaran_provinsi' => $this->MMap->TampilDataId('tb_alumni', $where),
        'provinsi'=> $this->MMap->TampilBaris('map_provinsi', ['id'=> $id]),
        'jml_alumni'=> $this->MMap->JumlahData('tb_alumni', $where)
    ];

    $hasil = [
        'view'=> view('Home/PetaProvinsi', $data),
        'tabel'=> view('Home/TabelProvinsi', $data)
    ];

        echo json_encode($hasil);
       }
    }

    // Detail Alumni 
public function Detail($id = null)
{
    
    $get = $this->MAlumni->DetailAlumni($id);
    $data = [
        'title'=> 'Detail Alumni',
        'data'=> $get ,
        'pekerjaan'=> $this->MMap->TampilBaris('tb_pekerjaan',['id'=>$get['pekerjaan_id']]),
    ];
 
    return view('Home/Detail', $data);
}

public function Menu()
{
    $data = ['title'=> 'Menu'];
    return view('Admin/menu', $data);
}


}
