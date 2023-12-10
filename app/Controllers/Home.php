<?php

namespace App\Controllers;

use App\Models\EventModel;

class Home extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $events = $eventModel->getClosestEvents();
        $data = [
            'title' => 'Events',
            'events' => $events,
        ];
        return view('pages/index', $data);
    }
}
