<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SuperadminLoginController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/superadmin/dashboard'));
        }
        return view('pages/superadmin/login', $data);
    }

    public function loginAuth()
    {
        helper(['form']);
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password setidaknya terdiri dari 8 karakter',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Login',
                'validation' => $this->validator
            ];

            return view('pages/superadmin/login', $data);
        }

        $userEntity = new \App\Entities\UserEntity();
        $userEntity->email = $this->request->getPost('email');
        $userEntity->password = $this->request->getPost('password');
        $userModel = new UserModel();
        $user = $userModel->where('email', $userEntity->email)->first();
        if (!$user) {
            return redirect()->to(base_url('/superadmin/login'))->withInput()->with('error_message', 'Email yang Anda masukkan salah');
        }

        $password = password_verify($this->request->getVar('password'), $user->password);
        if (!$password) {
            return redirect()->to(base_url('/superadmin/login'))->withInput()->with('error_message', 'Password yang Anda masukkan salah');
        }

        $dataSession = [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'image' => $user->image,
            'role_id' => $user->role_id,
            'logged_in' => true
        ];

        session()->set($dataSession);
        switch ($user->role_id) {
            case 1:
                # code...
                return redirect()->to(base_url('/admin/dashboard'))->with('success_message', 'Berhasil login, selamat datang, ' . $user->username);
                break;
            case 2:
                # code...
                return redirect()->to(base_url('/superadmin/dashboard'))->with('success_message', 'Berhasil login, selamat datang, ' . $user->username);
                break;
            default:
                # code...
                return redirect()->to(base_url('/superadmin/login'))->withInput()->with('error_message', 'Akun yang Anda masukkan tidak ditemukan');
                break;
        }
    }

    public function logout()
    {
        session()->destroy();
        $response = [
            'status' => 'success',
            'message' => 'Berhasil logout'
        ];

        echo json_encode($response);
    }
}
