<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;

class SuperadminDashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('pages/superadmin/dashboard', $data);
    }
}
