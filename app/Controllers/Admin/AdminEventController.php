<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\CLI\Console;

class AdminEventController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->where('role_id', 3)->findAll();
        $data = [
            'title' => 'Users',
            'users' => $users
        ];
        return view('pages/admin/events/index', $data);
    }

    public function new()
    {
        $userModel = new UserModel();
        $users = $userModel->where('role_id', 3)->findAll();
        $data = [
            'title' => 'New Event',
            'users' => $users,
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/events/new', $data);
    }

    public function store()
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_legth[2]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong',
                    'min_length' => 'Judul setidaknya terdiri dari 2 karakter',
                ]
            ],
            'description' => [
                'rules' => 'required|min_legth[10]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                ]
            ],
            'link' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Link tidak boleh kosong',
                    'min_length' => 'Link setidaknya terdiri dari 8 karakter',
                ]
            ],
            'banner' => [
                'rules' => 'max_size[image,2048]|mime_in[image,image/png,image/jpeg,image/jpg]|ext_in[image,png,jpg,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'mime_in' => 'Mime type tidak valid',
                    'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
                ]
            ],
            'host' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Penyelenggara tidak boleh kosong',
                    'min_length' => 'Penyelenggara setidaknya terdiri dari 3 karakter',
                ]
            ],
            'host_email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Penyelenggara tidak boleh kosong',
                    'valid_email' => 'Email Penyelenggara tidak valid',
                ]
            ],
            'target_audience' => [
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => 'Target Peserta tidak boleh kosong',
                    'min_length' => 'Target Peserta setidaknya terdiri dari 1 karakter',
                ]
            ],
            'quota' => [
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => 'Kuota Peserta tidak boleh kosong',
                    'min_length' => 'Kuota Peserta setidaknya terdiri dari 1 karakter',
                ]
            ],
            'event_type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tipe Event tidak boleh kosong',
                ]
            ],
            'required_approval' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persetujuan tidak boleh kosong',
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori tidak boleh kosong',
                ]
            ],
            'country' => [
                'rules' => 'required|min_legth[5]',
                'errors' => [
                    'required' => 'Negara tidak boleh kosong',
                    'min_legthh' => 'Negara setidaknya terdiri dari 1 karakter'
                ]
            ],
            'province' => [
                'rules' => 'required|min_legth[5]',
                'errors' => [
                    'required' => 'Provinsi tidak boleh kosong',
                    'min_legthh' => 'Provinsi setidaknya terdiri dari 1 karakter'
                ]
            ],
            'city' => [
                'rules' => 'required|min_legth[5]',
                'errors' => [
                    'required' => 'Kota tidak boleh kosong',
                    'min_legthh' => 'Kota setidaknya terdiri dari 1 karakter'
                ]
            ],
            'postal_code' => [
                'rules' => 'required|min_legth[5]',
                'errors' => [
                    'required' => 'Kode Pos tidak boleh kosong',
                    'min_legthh' => 'Kota setidaknya terdiri dari 1 karakter'
                ]
            ],
            'collaborator' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penanggung Jawav Event tidak boleh kosong',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $userModel = new UserModel();
            $users = $userModel->where('role_id', 3)->findAll();
            $data = [
                'title' => 'New User',
                'users' => $users,
                'validation' => $this->validator
            ];
            return view('pages/admin/events/new', $data);
        }

        $user = new \App\Entities\UserEntity();

        $imageFile = $this->request->getFile('image');

        if ($imageFile->isValid()) {
            $imageFileName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/assets/images/users/', $imageFileName);
            $user->image = 'images/users/' . $imageFileName;
        }

        $user->username = $this->request->getPost('username');
        $user->email = $this->request->getPost('email');
        $user->role_id = $this->request->getPost('role');
        $password = $this->request->getVar('password');
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new UserModel();
        $userModel->save($user);
        return redirect()->to(base_url('/superadmin/users'))->with('success_message', 'User baru berhasil ditambahkan');
    }
}
