<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Event Organizer'
        ];
        return view('pages/index', $data);
    }
}
