<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\EventModel;

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
        $eventModel = new EventModel();
        $event = $eventModel->find($id);
        $data = [
            'title' => 'Events',
            'event' => $event
        ];
        return view('pages/user/events/detail', $data);
    }
}
