<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventModel;
use CodeIgniter\I18n\Time;

class UserDashboardController extends BaseController
{

    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        $eventModel = new EventModel();
        $events = $eventModel->getEvents();

        foreach ($events as $event) {
            $event->date = $this->changeDateFormat($event->date);
        }

        $data = [
            'title' => 'Dashboard',
            'categories' => $categories,
            'events' => $events,
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
}
