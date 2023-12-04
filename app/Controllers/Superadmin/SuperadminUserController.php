<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

class SuperadminUserController extends BaseController
{
    public $helpers = ['form'];

    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        $data = [
            'title' => 'Users',
            'users' => $users
        ];
       return view('pages/superadmin/users/index', $data);
    }

    public function new()
    {
        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();
        $data = [
            'title' => 'New User',
            'roles' => $roles,
            'validation' => \Config\Services::validation()
        ];
        return view('pages/superadmin/users/new', $data);
    }

    public function store() {
        $rules = [
            'username' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'min_length' => 'Username setidaknya terdiri dari 5 karakter',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password setidaknya terdiri dari 8 karakter',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role tidak boleh kosong',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|mime_in[image,image/png,image/jpeg,image/jpg]|ext_in[image,png,jpg,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'mime_in' => 'Mime type tidak valid',
                    'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
                ]
            ]
        ];
        
        if(! $this->validate($rules)) {
            $roleModel = new RoleModel();
            $roles = $roleModel->findAll();
            $data = [
                'title' => 'New User',
                'roles' => $roles,
                'validation' => $this->validator
            ];
            return view('pages/superadmin/users/new', $data);
        }

        $user = new \App\Entities\UserEntity();

        $imageFile = $this->request->getFile('image');
        
        if($imageFile != '') {
            $imageFileName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH.'public/assets/images/users/', $imageFileName);
            $user->image = 'images/users/'.$imageFileName;
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

    public function destroy(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        if(! $user) {
            $response = [
                'status' => 'error',
                'message' => 'User gagal dihapus, id tidak ditemukan'
            ];
            echo json_encode($response);
            exit;
        }

        if($user->image !== 'images/users/profile-default.png') {
            unlink(ROOTPATH.'assets/'.$user->image);
        }
        $response = [
            'status' => 'success',
            'message' => 'User berhasil dihapus'
        ];
        $userModel->delete($user->id);
        echo json_encode($response);
    }
}
