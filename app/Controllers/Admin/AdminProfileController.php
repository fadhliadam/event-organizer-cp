<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminProfileController extends BaseController
{
    public $helpers = ['form'];

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'validation' => \Config\Services::validation()
        ];
        
        if($this->request->is('put')) {
            if(! $this->validate('updateProfile')) {
                $data = [
                    'title' => 'Profile',
                    'validation' => $this->validator
                ];
                
                return view('pages/admin/profile', $data);
            }

            $imageFile = $this->request->getFile('image');
            $imageFileName = $imageFile->getRandomName();

            $userModel = new UserModel();
            $user = $userModel->find(session()->get('id'));

            if($imageFile->isValid()) {
                if($user->image != 'images/users/profile-default.png') {
                    unlink(ROOTPATH.'public/assets/'.$user->image);
                }
                $imageFile->move(ROOTPATH.'public/assets/images/users',$imageFileName);
                $user->image = 'images/users/'.$imageFileName;
            } else {
                if($user->image != 'images/users/profile-default.png') {
                    unlink(ROOTPATH.'public/assets/'.$user->image);
                };
                $user->image = 'images/users/profile-default.png';
            }

            $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

            $user->username = $this->request->getPost('username');
            $user->password = $hashedPassword;

            if($user->hasChanged()) {
                session()->set('username', $user->username);
                session()->set('image', $user->image);
                $userModel->save($user);
                return redirect()->to(base_url('/admin/profile'))->with('success_message', 'Berhasil mengubah profile');
            }
        }

        return view('pages/admin/profile', $data);
    }
}
