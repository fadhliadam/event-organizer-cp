<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\EventCollaboratorModel;

class UserCollaboratorController extends BaseController
{
    public function index()
    {
        $eventCollaboratorModel = new EventCollaboratorModel();
        $events = $eventCollaboratorModel->getCollaboratorEventsByUserId(session()->get('id'));

        $data = [
            'title' => 'Events',
            'events' => $events,
        ];

        return view('pages/user/collaborators/index', $data);
    }
}
