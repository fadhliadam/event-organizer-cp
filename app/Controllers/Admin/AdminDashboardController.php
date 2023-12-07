<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventCollaboratorModel;
use App\Models\EventModel;

class AdminDashboardController extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $eventCollaboratorModel = new EventCollaboratorModel();

        // Mendapatkan semua event yang dimiliki oleh user dengan session id
        $events = $eventModel->where('owner', session('id'))->findAll();
        $eventCollaborators = $eventCollaboratorModel->findAll();

        // Menghitung jumlah total event
        $eventCount = count($events);
        $eventCollaboratorCount = count($eventCollaborators);

        // Menghitung jumlah event online (event_type = 0)
        $eventOnlineCount = 0;

        foreach ($events as $event) {
            // Menggunakan metode objek untuk mengakses properti event_type
            if ($event->event_type == 0) {
                $eventOnlineCount++;
            }
        }
        // Menghitung jumlah event online (event_type = 0)
        $eventOfflineCount = 0;

        foreach ($events as $event) {
            // Menggunakan metode objek untuk mengakses properti event_type
            if ($event->event_type == 1) {
                $eventOfflineCount++;
            }
        }

        $data = [
            'title' => 'Events',
            'events' => $events,
            'eventsCount' => $eventCount,
            'eventsOnlineCount' => $eventOnlineCount,
            'eventsOfflineCount' => $eventOfflineCount,
            'eventCollaboratorCount' => $eventCollaboratorCount,
        ];

        return view('pages/admin/dashboard', $data);
    }

    public function collaborator()
    {
        $data['title'] = 'Halaman Konten';
        return view('pages/admin/collaborator', $data);
    }
}
