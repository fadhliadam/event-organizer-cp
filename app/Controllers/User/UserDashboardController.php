<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class UserDashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/user/dashboard', $data);
    }
}
