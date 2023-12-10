<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventModel;
use CodeIgniter\I18n\Time;

class UserEventController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Events',
        ];
        return view('pages/user/events/index', $data);
    }

    public function detail(int $id)
    {
        helper(['number']);
        $eventModel = new EventModel();
        $event = $eventModel->find($id);
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($event->category_id);

        $location = $event->city . ", " . $event->province;
        if ($event->type == 0) $location = "Online";

        if ($event->price == 0) {
            $event->price = 'Gratis';
        } else {
            $event->price = number_to_currency($event->price, 'IDR', 'id_ID');
        }

        $event->date = $this->changeDateFormat($event->date);
        $data = [
            'title' => 'Events',
            'event' => $event,
            'category' => $category->name,
            'location' => $location
        ];
        return view('pages/user/events/detail', $data);
    }

    public function registerProcess()
    {
        $response = [
            'status' => 'success',
            'message' => 'Berhasil daftar event'
        ];
        return json_encode($response);
    }

    public function changeDateFormat(string $date)
    {
        $originalFormat = 'Y-m-d';

        $originalTime = Time::createFromFormat($originalFormat, $date);

        $formattedDate = $originalTime->format('d M Y');

        return $formattedDate;
    }
}
