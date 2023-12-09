<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventCollaboratorModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class AdminCollaboratorController extends BaseController
{

    public function index()
    {
        $collaboratorModel = new EventCollaboratorModel();

        // Mendapatkan data event_collaborator beserta relasi user dan event
        $collaborators = $collaboratorModel
            ->join('users', 'users.id = event_collaborators.user_id')
            ->join('events', 'events.id = event_collaborators.event_id')
            ->select('event_collaborators.*,users.id as user_id,
             users.email as user_email,
             users.username as user_username, 
             events.name as event_name, 
             events.owner as event_owner, 
             events.country as event_country,
             events.province as event_province,
             events.city as event_city,
             events.postal_code as event_postal_code,
             events.street as event_street,
             events.date as event_date,
             ')
            ->findAll();

        $data = [
            'title' => 'Users',
            'collaborators' => $collaborators
        ];
        return view('pages/admin/collaborators/index', $data);
    }
}
