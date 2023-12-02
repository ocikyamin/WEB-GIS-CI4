<?php

//   Author : Abdul Yamin
//   Email : ocikyamin@gmail.com
//   https://github.com/ocikyamin
  
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MMap;
use App\Models\MAlumni;


class Admin extends BaseController
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
            'title'=> 'Home',
            'persebaran'=> $this->MAlumni->PersebaranAll()
        ];

        return view('Admin/Home', $data);
    }
// Provinsi 
    public function Wilayah()
    {
        $data = ['title'=> 'Daftar Provinsi','prov'=> $this->MMap->TampilData('map_provinsi')];
        return view('Admin/Wilayah/Provinsi/index', $data);
    }
            public function AddProvinsi()
            {
            if ($this->request->isAJAX()) {
            $msg = ['view'=>view('Admin/Wilayah/Provinsi/add')];
            echo json_encode($msg);
            }
            }
            public function EditProvinsi()
            {
            if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = ['prov'=> $this->MMap->TampilBaris('map_provinsi', ['id'=>$id])];
            $msg = ['view'=>view('Admin/Wilayah/Provinsi/edit',$data)];
            echo json_encode($msg);
            }
            }
    
    public function SaveProvinsi()
            {
            if ($this->request->isAJAX()) {
            $this->validate= \Config\Services::validation();
            $validate = $this->validate(
            [
            'provinsi' => [
            'label'  => 'Provinsi',
            'rules'  => 'required|is_unique[map_provinsi.provinsi]',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'is_unique' => '{field} Sudah ada.',
            ]
            ]
            ]
            );
            if (!$validate) {
            $msg = [
            'error' => [
            'provinsi' => $this->validate->getError('provinsi')
            ]
            ];
            }else{
            $data = [
            'provinsi'=>$this->request->getPost('provinsi'),
            'latitude'=>$this->request->getPost('lat'),
            'longitude'=>$this->request->getPost('long')
            ];
            $insert=  $this->MMap->SimpanData('map_provinsi',$data);
            $msg = ['res'=> true];
            }
            echo json_encode($msg);
            }

    }
    public function UpdateProvinsi()
            {
            if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $provinsi = $this->request->getPost('provinsi');
            $old_prov = $this->request->getPost('old_prov');

            if ($provinsi==$old_prov) {
                $rule_prov = 'required';
            }else{
                $rule_prov = 'required|is_unique[map_provinsi.provinsi]';
            }

            $this->validate= \Config\Services::validation();
            $validate = $this->validate(
            [
            'provinsi' => [
            'label'  => 'Provinsi',
            'rules'  => $rule_prov,
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'is_unique' => '{field} Sudah ada.',
            ]
            ]
            ]
            );
            if (!$validate) {
            $msg = [
            'error' => [
            'provinsi' => $this->validate->getError('provinsi')
            ]
            ];
            }else{
            $data = [
            'provinsi'=>$this->request->getPost('provinsi'),
            'latitude'=>$this->request->getPost('lat'),
            'longitude'=>$this->request->getPost('long')
            ];
            $insert=  $this->MMap->UpdateData('map_provinsi',$data,['id'=> $id]);
            $msg = ['res'=> true];
            }
            echo json_encode($msg);
            }

    }
    public function ListKabupaten($id)
    {
     
        $data = ['title'=> 'Daftar Kabupaten',
        'prov'=> $this->MMap->TampilBaris('map_provinsi', ['id'=>$id]),
        'kab'=> $this->MMap->TampilDataId('map_kabupaten', ['provinsi_id'=>$id])
    ];
        return view('Admin/Wilayah/Kabupaten/index', $data);
    }

    // Kabupaten 
    public function AddKabupaten()
    {
    if ($this->request->isAJAX()) {
        $id = $this->request->getVar('id');
        $data = ['prov'=> $this->MMap->TampilBaris('map_provinsi', ['id'=>$id])];
    
    $msg = ['view'=>view('Admin/Wilayah/Kabupaten/add', $data)];
    echo json_encode($msg);
    }
    }
    public function SaveKabupaten()
            {
            if ($this->request->isAJAX()) {
            $this->validate= \Config\Services::validation();
            $validate = $this->validate(
            [
            'kabupaten' => [
            'label'  => 'kabupaten',
            'rules'  => 'required|is_unique[map_kabupaten.kabupaten]',
            'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'is_unique' => '{field} Sudah ada.',
            ]
            ]
            ]
            );
            if (!$validate) {
            $msg = [
            'error' => [
            'kabupaten' => $this->validate->getError('kabupaten')
            ]
            ];
            }else{
            $data = [
            'provinsi_id'=> $this->request->getPost('provinsi_id'),
            'kabupaten'=>$this->request->getPost('kabupaten'),
            'latitude'=>$this->request->getPost('lat'),
            'longitude'=>$this->request->getPost('long')
            ];
            $insert=  $this->MMap->SimpanData('map_kabupaten',$data);
            $msg = ['res'=> true];
            }
            echo json_encode($msg);
            }

    }

    public function EditKabupaten()
    {
    if ($this->request->isAJAX()) {
        $id = $this->request->getVar('id');
        $data = ['kab'=> $this->MMap->TampilBaris('map_kabupaten', ['id'=>$id])];
    
    $msg = ['view'=>view('Admin/Wilayah/Kabupaten/edit', $data)];
    echo json_encode($msg);
    }
    }

    public function UpdateKabupaten()
    {
    if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
        $kabupaten = $this->request->getPost('kabupaten');
        $old_kab = $this->request->getPost('old_kab');

        if ($kabupaten==$old_kab) {
            $rule_kab = 'required';
        }else{
            $rule_kab = 'required|is_unique[map_kabupaten.kabupaten]';
        }
    $this->validate= \Config\Services::validation();
    $validate = $this->validate(
    [
    'kabupaten' => [
    'label'  => 'kabupaten',
    'rules'  => $rule_kab,
    'errors' => [
    'required' => '{field} Tidak Boleh Kosong',
    'is_unique' => '{field} Sudah ada.',
    ]
    ]
    ]
    );
    if (!$validate) {
    $msg = [
    'error' => [
    'kabupaten' => $this->validate->getError('kabupaten')
    ]
    ];
    }else{
    $data = [
    'kabupaten'=>$this->request->getPost('kabupaten'),
    'latitude'=>$this->request->getPost('lat'),
    'longitude'=>$this->request->getPost('long')
    ];
    $insert=  $this->MMap->UpdateData('map_kabupaten',$data,['id'=> $id]);
    $msg = ['res'=> true];
    }
    echo json_encode($msg);
    }

}


// List Kecamatan 
public function ListKecamatan($id)
{
 
    $data = ['title'=> 'Daftar Kecamatan',
    'kab'=> $this->MMap->TampilBaris('map_kabupaten', ['id'=>$id]),
    'kec'=> $this->MMap->TampilDataId('map_kecamatan', ['kabupaten_id'=>$id])
];
    return view('Admin/Wilayah/Kecamatan/index', $data);
}

public function AddKecamatan()
{
if ($this->request->isAJAX()) {
    $id = $this->request->getVar('id');
    $data = ['kab'=> $this->MMap->TampilBaris('map_kabupaten', ['id'=>$id])];

$msg = ['view'=>view('Admin/Wilayah/Kecamatan/add', $data)];
echo json_encode($msg);
}
}
public function SaveKecamatan()
        {
        if ($this->request->isAJAX()) {
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'kecamatan' => [
        'label'  => 'kecamatan',
        'rules'  => 'required|is_unique[map_kecamatan.kecamatan]',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'is_unique' => '{field} Sudah ada.',
        ]
        ]
        ]
        );
        if (!$validate) {
        $msg = [
        'error' => [
        'kecamatan' => $this->validate->getError('kecamatan')
        ]
        ];
        }else{
        $data = [
        'kabupaten_id'=> $this->request->getPost('kabupaten_id'),
        'kecamatan'=>$this->request->getPost('kecamatan'),
        'latitude'=>$this->request->getPost('lat'),
        'longitude'=>$this->request->getPost('long')
        ];
        $insert=  $this->MMap->SimpanData('map_kecamatan',$data);
        $msg = ['res'=> true];
        }
        echo json_encode($msg);
        }

}

public function EditKecamatan()
{
if ($this->request->isAJAX()) {
    $id = $this->request->getVar('id');
    $data = ['kec'=> $this->MMap->TampilBaris('map_kecamatan', ['id'=>$id])];

$msg = ['view'=>view('Admin/Wilayah/Kecamatan/edit', $data)];
echo json_encode($msg);
}
}

public function UpdateKecamatan()
{
if ($this->request->isAJAX()) {
    $id = $this->request->getPost('id');
    $kecamatan = $this->request->getPost('kecamatan');
    $old_kec = $this->request->getPost('old_kec');

    if ($kecamatan==$old_kec) {
        $rule_kec = 'required';
    }else{
        $rule_kec = 'required|is_unique[map_kecamatan.kecamatan]';
    }
$this->validate= \Config\Services::validation();
$validate = $this->validate(
[
'kecamatan' => [
'label'  => 'kecamatan',
'rules'  => $rule_kec,
'errors' => [
'required' => '{field} Tidak Boleh Kosong',
'is_unique' => '{field} Sudah ada.',
]
]
]
);
if (!$validate) {
$msg = [
'error' => [
'kecamatan' => $this->validate->getError('kecamatan')
]
];
}else{
$data = [
'kecamatan'=>$this->request->getPost('kecamatan'),
'latitude'=>$this->request->getPost('lat'),
'longitude'=>$this->request->getPost('long')
];
$insert=  $this->MMap->UpdateData('map_kecamatan',$data,['id'=> $id]);
$msg = ['res'=> true];
}
echo json_encode($msg);
}

}


// Alumni 

public function ListAlumni()
{
    $data = [
        'title'=> 'Daftar Alumni',
        'prov'=> $this->MMap->TampilData('map_provinsi'),
        'pekerjaan'=> $this->MMap->TampilData('tb_pekerjaan'),
        'list'=> $this->MAlumni->findAll()

    ];

    return view('Admin/Alumni/index', $data);
}

// Detail Alumni 
public function Detail($id = null)
{
    $get = $this->MAlumni->DetailAlumni($id);
    // var_dump($get['pekerjaan_id']);
    $data = [
        'title'=> 'Detail Alumni',
        'data'=> $get ,
        'pekerjaan'=> $this->MMap->TampilBaris('tb_pekerjaan',['id'=>$get['pekerjaan_id']]),
      

    ];
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";


    return view('Admin/Alumni/Detail', $data);
}
// PrintDetail
public function PrintDetail($id = null)
{
    $get = $this->MAlumni->DetailAlumni($id);
    $data = [
        'title'=> 'Detail Alumni',
        'data'=> $get ,
        'pekerjaan'=> $this->MMap->TampilBaris('tb_pekerjaan',['id'=>$get['pekerjaan_id']]),
      

    ];
    return view('Admin/Alumni/Print', $data);
}

public function FilterTahun()
{
    if ($this->request->isAJAX()) {
        $tahun = $this->request->getVar('tahun');
        $where = ['tahun_lulus'=> $tahun];
        $data = [
            'tahun'=> $tahun,
            'list'=> $this->MAlumni->filter('tahun',$where)];
        $msg = ['view'=> view('Admin/Alumni/filter_tahun',$data)];
        echo json_encode($msg);
       }
}

public function FilterProvinsi()
{
    if ($this->request->isAJAX()) {
        $prov = $this->request->getVar('prov');
        $where = ['provinsi_id'=> $prov];
        $data = [
            'prov'=> $this->MMap->TampilBaris('map_provinsi', ['id'=>$prov]),
            'list'=> $this->MAlumni->filter('prov',$where)];
        $msg = ['view'=> view('Admin/Alumni/filter_provinsi',$data)];
        echo json_encode($msg);
       }
}

public function FilterPekerjaan()
{
    if ($this->request->isAJAX()) {
        $pekerjaan = $this->request->getVar('pekerjaan');
        $where = ['pekerjaan_id'=> $pekerjaan];
        $data = [
            'pkj'=> $this->MMap->TampilBaris('tb_pekerjaan', ['id'=>$pekerjaan]),
            'list'=> $this->MAlumni->filter('pekerjaan',$where)];
        $msg = ['view'=> view('Admin/Alumni/filter_pekerjaan',$data)];
        echo json_encode($msg);
       }
}

// ListPekerjaan
public function ListPekerjaan()
{
    $data = ['title'=> 'Daftar Pekerjaan',
    'pekerjaan'=> $this->MMap->TampilData('tb_pekerjaan')
];
    return view('Admin/Pekerjaan/index', $data);
}


public function AddPekerjaan()
{
if ($this->request->isAJAX()) {
$msg = ['view'=>view('Admin/Pekerjaan/add')];
echo json_encode($msg);
}
}


public function SavePekerjaan()
        {
        if ($this->request->isAJAX()) {
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'pekerjaan' => [
        'label'  => 'pekerjaan',
        'rules'  => 'required|is_unique[tb_pekerjaan.pekerjaan]',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'is_unique' => '{field} Sudah ada.',
        ]
        ]
        ]
        );
        if (!$validate) {
        $msg = [
        'error' => [
        'pekerjaan' => $this->validate->getError('pekerjaan')
        ]
        ];
        }else{
        $data = [
        'pekerjaan'=>$this->request->getPost('pekerjaan')
        ];
        $insert=  $this->MMap->SimpanData('tb_pekerjaan',$data);
        $msg = ['res'=> true];
        }
        echo json_encode($msg);
        }

}

public function EditPekerjaan()
{
if ($this->request->isAJAX()) {
    $id = $this->request->getVar('id');
    $data = ['pkj'=> $this->MMap->TampilBaris('tb_pekerjaan', ['id'=>$id])];

$msg = ['view'=>view('Admin/Pekerjaan/edit', $data)];
echo json_encode($msg);
}
}

public function UpdatePekerjaan()
{
if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $old_pkj = $this->request->getPost('old_pkj');

        if ($pekerjaan==$old_pkj) {
        $rule_pkj = 'required';
        }else{
        $rule_pkj = 'required|is_unique[tb_pekerjaan.pekerjaan]';
        }
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'pekerjaan' => [
        'label'  => 'pekerjaan',
        'rules'  => $rule_pkj,
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'is_unique' => '{field} Sudah ada.',
        ]
        ]
        ]
        );
        if (!$validate) {
        $msg = [
        'error' => [
        'pekerjaan' => $this->validate->getError('pekerjaan')
        ]
        ];
        }else{
        $data = [
        'id'=>$this->request->getPost('id'),
        'pekerjaan'=>$this->request->getPost('pekerjaan')
        ];
        $insert=  $this->MMap->UpdateData('tb_pekerjaan',$data,['id'=> $id]);
        $msg = ['res'=> true];
        }
        echo json_encode($msg);
        }

        }







        // Profile

        public function Profile()
        {
           $data = [
            'title'=> 'Profile',
            'user' => $this->MMap->TampilBaris('users', ['id'=>session('user_ses')])
        ];

        return view('Admin/Profile/index', $data);
        }

public function UpdateProfile(){
if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');
        $old_email = $this->request->getPost('old_email');

        if ($email==$old_email) {
        $rule_email = 'required';
        }else{
        $rule_email = 'required|is_unique[users.email]';
        }
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
            'nama' => [
                'label'  => 'nama',
                'rules'  => 'required',
                'errors' => [
                'required' => '{field} Tidak Boleh Kosong'
                ]
                ],
        'email' => [
        'label'  => 'email',
        'rules'  => $rule_email,
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'is_unique' => '{field} Sudah ada.',
        ]
        ]
        ]
        );
        if (!$validate) {
        $msg = [
        'error' => [
            'nama' => $this->validate->getError('nama'),
        'email' => $this->validate->getError('email')
        ]
        ];
        }else{
        $data = [
        'id'=>$this->request->getPost('id'),
        'nama'=>$this->request->getPost('nama'),
        'email'=>$this->request->getPost('email')
        ];
        $insert=  $this->MMap->UpdateData('users',$data,['id'=> $id]);
        $msg = ['res'=> true];
        }
        echo json_encode($msg);
        }

        }

    public function UpdatePassword(){
    if ($this->request->isAJAX()) {
    $id = $this->request->getPost('id');
   

    $this->validate= \Config\Services::validation();
    $validate = $this->validate(
    [
    'old_pass' => [
    'label'  => 'Password Lama',
    'rules'  => 'required',
    'errors' => [
    'required' => '{field} Tidak Boleh Kosong'
    ]
    ],
    'new_pass' => [
    'label'  => 'Password Baru',
    'rules'  => 'required',
    'errors' => [
    'required' => '{field} Tidak Boleh Kosong',
    'is_unique' => '{field} Sudah ada.',
    ]
    ],
    'conf_pass' => [
        'label'  => 'Konfirmasi Password',
        'rules'  => 'required|matches[new_pass]',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        'matches' => '{field} Tidak sesuai',
        ]
        ]
    ]
    );
    if (!$validate) {
    $msg = [
    'error' => [
    'old_pass' => $this->validate->getError('old_pass'),
    'new_pass' => $this->validate->getError('new_pass'),
    'conf_pass' => $this->validate->getError('conf_pass')
    ]
    ];
    }else{
        $db_pass = $this->request->getPost('db_pass');
        $old_pass = $this->request->getPost('old_pass');
        $is_valid = password_verify($old_pass, $db_pass);
        if ($is_valid) {
            $data = [
                'id'=>$this->request->getPost('id'),
                'password'=> password_hash($this->request->getPost('conf_pass'), PASSWORD_BCRYPT)
                ];
                $insert=  $this->MMap->UpdateData('users',$data,['id'=> $id]);
                $msg = ['res'=> true];
        }else{
            $msg = [
                'error' => [
                'old_pass' => 'Password Lama salah'
                ]
                ];

        }
   
    }
    echo json_encode($msg);
    }

    }

    // Testimoni
    public function ListTestimoni()
    {
        $data = ['title'=> 'Daftar Testimoni',
        'testimoni'=> $this->MMap->TampilData('testimoni')
    ];
        return view('Admin/Testimoni/index', $data);
    }

    public function EditTestimoni()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $status = $this->request->getVar('status');
            $data = ['status_publish'=> $status==1 ? NULL:1 ];

            $del = $this->MMap->UpdateData('testimoni',$data,['id'=> $id]);
            $msg = ['res'=> 200];
            echo json_encode($msg);
           }
    }


    public function HapusRow()
    {
       if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
        $table = $this->request->getPost('table');
        $del = $this->MMap->HapusData($table,['id'=>$id]);
        $msg = ['res'=> 200];
        echo json_encode($msg);
       }
    }

    function Logout()
{
session()->remove('user_ses');
return redirect()->to(base_url('login'));
    
}
    
}
