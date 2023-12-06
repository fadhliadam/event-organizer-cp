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

    public function new()
    {
        helper(['form']);
        $data = [
            'title' => 'New Event',
            'validation' => \Config\Services::validation()
        ];

        return view('pages/superadmin/events/new', $data);
    }

    public function destroy(int $id)
    {
        $eventModel = new EventModel();
        $event = $eventModel->find($id);
        if(! $event) {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus event, id tidak ditemukan'
            ];
            echo json_encode($response);
            exit;
        }
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus event'
            ];
            $eventModel->where('id', $id)->delete();
            echo json_encode($response);
    }
}
