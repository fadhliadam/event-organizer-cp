<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
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
        $event->date = $this->changeDateFormat($event->date);
        $data = [
            'title' => 'Events',
            'event' => $event
        ];
        return view('pages/user/events/detail', $data);
    }

    public function changeDateFormat(string $date)
    {
        $originalFormat = 'Y-m-d';

        $originalTime = Time::createFromFormat($originalFormat, $date);

        $formattedDate = $originalTime->format('d M Y');

        return $formattedDate;
    }
}
