<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        $data = [
            'title' => 'Users',
            'users' => $users
        ];
       return view('pages/superadmin/user', $data);
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

        if($user->image !== 'images/profile-default.png') {
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
