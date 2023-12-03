<?php

namespace App\Controllers;

use CodeIgniter\CLI\Console;

class AdminController extends BaseController
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
