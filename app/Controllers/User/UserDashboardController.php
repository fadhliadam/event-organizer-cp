<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class UserDashboardController extends BaseController
{

    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $data = [
            'title' => 'Dashboard',
            'categories' => $categories
        ];
        return view('pages/user/dashboard', $data);
    }
}
