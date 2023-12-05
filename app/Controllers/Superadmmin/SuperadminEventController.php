<?php

namespace App\Controllers\Superadmmin;

use App\Controllers\BaseController;
use App\Models\EventModel;

class SuperadminEventController extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $events = $eventModel->getEvents();
        $data = [
            'title' => 'Events',
            'events' => $events
        ];

        return view('pages/superadmin/events/index', $data);
    }
}
