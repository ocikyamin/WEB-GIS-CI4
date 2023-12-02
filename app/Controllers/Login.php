<?php
//   Author : Abdul Yamin
//   Email : ocikyamin@gmail.com
//   https://github.com/ocikyamin
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MMap;
class Login extends BaseController
{
    function __construct()
    {
    $this->MMap = new MMap;
    }
    public function index()
    {
        return view('Login/index');
    }

    public function LoginCek()
    {
       if ($this->request->isAJAX()) {
        $this->validate= \Config\Services::validation();
        $validate = $this->validate(
        [
        'email' => [
        'label'  => 'Email',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],
         'password' => [
        'label'  => 'Password',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong'
        ]
        ],
        ]
        );

        if (!$validate) {
            $msg = [
            'error' => [
            'email' => $this->validate->getError('email'),
            'password' => $this->validate->getError('password')
            ]
            ];
        }else{
            $email   = $this->request->getPost('email');
            $password    = $this->request->getPost('password');
            $user = $this->MMap->CekLogin($email);
            if ($user) {
                // Cek Apakah is_ctive=1 akun aktif
                if ($user->is_active==1) {
                    $is_valid = password_verify($password, $user->password);
                    // cek password jika valid
                    if ($is_valid) {
                        // buat session user login 
                        $new_session = ['user_ses' => intval($user->id)];
                        session()->set($new_session);
                        $msg = [
                            'sukses'=> 200,
                            'link'=> base_url('admin')
                    ];
                    }else{
                        $msg = ['error'=> ['password'=> 'Password Tidak Benar']];
                    }
                }else{
                    // pesan jika Akun tidak aktif 
                    $msg = ['error'=> ['email'=> 'Akun Tidak Aktif']];
                }
            }else{
                // jika email tidak ada 
            $msg = ['error'=> ['email'=> 'Email Belum Terdaftar.']];
            }
        

        }
        // dd($is_santri);
        // Login Sebagi Santri 

        echo json_encode($msg);
       
       
    
    }
    }
}
