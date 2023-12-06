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
        $users = $userModel->getUsers(session()->get('id'));
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
        if(! $this->validate('addUser')) {
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
        
        if($imageFile->isValid()) {
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

    public function edit(int $id) {
        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();
        $userModel = new UserModel();
        $user = $userModel->withDeleted()->find($id);

        if(!$user) {
            return redirect()->to(base_url('/superadmin/users'))->with('error_message', "User tidak ditemukan");
        }

        $data = [
            'title' => 'Edit User',
            'roles' => $roles,
            'user' => $user,
            'validation' => \Config\Services::validation()
        ];

        return view('pages/superadmin/users/edit', $data);
    }

    public function update(int $id) {

        if($this->request->getPost('_method') == 'put') {
            $userModel = new UserModel();
            $user = $userModel->withDeleted()->find($id);

            if(!$user) {
                return redirect()->to(base_url('/superadmin/users'))->with('error_message', "User tidak ditemukan");
            }

            if(!$this->validate('updateUser')) {
                $roleModel = new RoleModel();
                $roles = $roleModel->findAll();
                $data = [
                    'title' => 'Edit User',
                    'roles' => $roles,
                    'user' => $user,
                    'validation' => $this->validator
                ];
        
                return view('pages/superadmin/users/edit', $data);
            }

            $imageFile = $this->request->getFile('image');
            $imageFileName = $imageFile->getRandomName();
            if($imageFile->isValid())  {
                if($user->image != 'images/users/profile-default.png') {
                    unlink(ROOTPATH.'public/assets/'.$user->image);
                }
                $imageFile->move(ROOTPATH.'public/assets/images/users/', $imageFileName);
                $user->image = 'images/users/'.$imageFileName;
            }

            $user->username = $this->request->getPost('username');
            $user->password = $this->request->getPost('password');
            $user->role_id = $this->request->getPost('role');
            $activateUser = $this->request->getPost('activateUser');
            if($activateUser != 'on') {
                $user->deleted_at = date("Y-m-d H:i:s");
            } else {
                $user->deleted_at = null;
            }
            
            if($user->hasChanged()){
                $userModel->save($user);
                return redirect()->to(base_url('/superadmin/users'))->with('success_message', 'User berhasil diubah');
            }
            return redirect()->to(base_url('/superadmin/users'))->with('success_message', 'User berhasil diubah');
        }
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

        $defaultImage = 'images/users/profile-default.png';
        if($user->image !== $defaultImage) {
            unlink(ROOTPATH.'public/assets/'.$user->image);
        }
        $response = [
            'status' => 'success',
            'message' => 'User berhasil dihapus'
        ];
        $userModel->update($user->id, ['image' => $defaultImage]);
        $userModel->delete($user->id);
        echo json_encode($response);
    }
}
