<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventModel;
use CodeIgniter\I18n\Time;

class UserDashboardController extends BaseController
{
    protected $categories, $eventModel;

    public function __construct()
    {
        helper(['number', 'date']);
        $this->categoryModel = new CategoryModel();
        $this->categories = $this->categoryModel->findAll();
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'categories' => $this->categories,
            'events' => $this->eventModel->paginate(6, 'events'),
            'pager' => $this->eventModel->pager,
            'time' => new Time()
        ];
        return view('pages/user/dashboard', $data);
    }

    public function changeDateFormat(string $date)
    {
        $originalFormat = 'Y-m-d';

        $originalTime = Time::createFromFormat($originalFormat, $date);

        $formattedDate = $originalTime->format('d M Y');

        return $formattedDate;
    }

    // public function filterCategory(string $category)
    // {
    //     $categosy = $this->categories;
    //     $this->db->from('products');

    //     if ((int)$category_id > 0) {
    //         $this->db->where('category_id', $category_id);
    //     }

    //     $query = $this->db->get();
    //     return $query->result();
    // }
}
