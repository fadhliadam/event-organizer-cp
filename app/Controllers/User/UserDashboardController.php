<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventModel;
use CodeIgniter\I18n\Time;

class UserDashboardController extends BaseController
{
    protected $categoryModel, $categories, $eventModel;

    public function __construct()
    {
        helper(['number', 'date', 'form']);
        $this->categoryModel = new CategoryModel();
        $this->categories = $this->categoryModel->findAll();
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $category = $this->request->getGet('category') ?? 'all';
        $name = $this->request->getGet('nameEvent');
        $keyword = [
            'category' => $category,
            'name' => $name
        ];
        $events = $this->eventModel->getEvents($keyword, 6);
        $data = [
            'title' => 'Dashboard',
            'categories' => $this->categories,
            'events' => $events['events'],
            'pager' => $events['pager'],
            'time' => new Time(),
        ];

        return view('pages/user/dashboard', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];

        return view('pages/user/profile', $data);
    }

    public function changeDateFormat(string $date)
    {
        $originalFormat = 'Y-m-d';

        $originalTime = Time::createFromFormat($originalFormat, $date);

        $formattedDate = $originalTime->format('d M Y');

        return $formattedDate;
    }

    public function filterCategory()
    {
        $categoryId = $this->request->getGet('categoryId') ? $this->request->getGet('categoryId') : 0;
        $page = $this->request->getVar('page_events') ? $this->request->getVar('page_events') : 1;

        $events = $this->eventModel;
        if ($categoryId > 0) {
            $events = $events->where('category_id', $categoryId);
        }

        $eventsData = $events->paginate(6, 'events', $page);

        $prices = [];
        foreach ($eventsData as $event) {
            $price = '';
            if ($event->quota != 0) {
                if ($event->price == 0) {
                    $price = 'Gratis';
                    array_push($prices, $price);
                } else {
                    $price = number_to_currency($event->price, 'IDR', 'id_ID');
                    array_push($prices, $price);
                }
            } else {
                array_push($prices, $price);
            }
        }

        $response = [
            'title' => 'Dashboard',
            'categories' => $this->categories,
            'events' => $eventsData,
            'pager' => $events->pager,
            'prices' => $prices,
            'time' => new Time(),
            'selectedCategoryId' => $categoryId
        ];

        echo json_encode($response);
    }
}
