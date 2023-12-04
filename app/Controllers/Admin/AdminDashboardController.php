<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminDashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Halaman Konten';
        return view('pages/admin/dashboard', $data);
    }
    public function collaborator()
    {
        $data['title'] = 'Halaman Konten';
        return view('pages/admin/collaborator', $data);
    }
}
