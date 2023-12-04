<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\CLI\Console;

class AdminEventController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Halaman Konten';
        return view('pages/admin/event', $data);
    }
}
