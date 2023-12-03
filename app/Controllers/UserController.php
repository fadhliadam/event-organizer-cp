<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Users',
        ];
       return view('pages/superadmin/user', $data);
    }
}
