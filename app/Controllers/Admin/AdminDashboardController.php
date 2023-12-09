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

    // Menghitung jumlah event offline (event_type = 1)
    $eventOfflineCount = 0;

    // Menghitung jumlah event yang sudah selesai (done)
    $eventDoneCount = 0;

    $currentDate = strtotime(date('Y-m-d'));

    foreach ($events as $event) {
        // Menggunakan metode objek untuk mengakses properti event_type
        if ($event->event_type == 0) {
            $eventOnlineCount++;
        } elseif ($event->event_type == 1) {
            $eventOfflineCount++;
        }

        // Mengonversi tanggal event ke timestamp
        $eventDate = strtotime($event->date);

        // Jika tanggal event sudah lewat, maka dianggap sudah selesai
        if ($eventDate < $currentDate) {
            $eventDoneCount++;
        }
    }

    $data = [
        'title' => 'Events',
        'events' => $events,
        'eventsCount' => $eventCount,
        'eventsOnlineCount' => $eventOnlineCount,
        'eventsOfflineCount' => $eventOfflineCount,
        'eventDoneCount' => $eventDoneCount,
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
