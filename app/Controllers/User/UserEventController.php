<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventModel;
use App\Models\UserEventRegistersModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class UserEventController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Events',
        ];
        return view('pages/user/dashboard', $data);
    }

    public function detail(int $id)
    {
        helper(['number', 'form']);
        $eventModel = new EventModel();
        $event = $eventModel->find($id);
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($event->category_id);
        $userEventModel = new UserEventRegistersModel();
        $user = $userEventModel->getDataByEventAndUser(session()->get('id'), $id);

        $location = $event->city . ", " . $event->province;
        if ($event->type == 0) $location = "Online";

        if ($event->price == 0) {
            $event->price = 'Gratis';
        } else {
            $event->price = number_to_currency($event->price, 'IDR', 'id_ID');
        }

        $event->date = $this->changeDateFormat($event->date);
        $data = [
            'title' => 'Events',
            'event' => $event,
            'category' => $category->name,
            'user' => $user[0],
            'location' => $location
        ];
        return view('pages/user/events/detail', $data);
    }

    public function registerProcess()
    {
        $userEventEntity = new \App\Entities\UserEventRegisterEntity();
        $userEventModel = new UserEventRegistersModel();
        $request = \Config\Services::request();
        $userModel = new UserModel();
        $userId = $userModel->getIdUserByEmail(session()->get('email'));
        $eventId = $request->getPost('eventId');
        $requiredApproval = $request->getPost('requiredApproval');


        $userEventEntity->user_id = $userId[0]->id;
        $userEventEntity->event_id = $eventId;
        if ($requiredApproval == 1) {
            $userEventEntity->status = 0;
            $userEventEntity->is_completed = 0;
        } else {
            $userEventEntity->status = 1;
            $userEventEntity->is_completed = 0;
        }

        $registeredEvent = $userEventModel->getDataByEventAndUser($userId[0]->id, $eventId);

        if (!$registeredEvent) {
            $userEventModel->save($userEventEntity);
            $response = [
                'status' => 'success',
                'message' => 'Berhasil daftar event'
            ];
            return json_encode($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Anda telah terdaftar di event ini'
            ];
            return json_encode($response);
        }
    }

    public function listEventsRegistered()
    {
        $userEventModel = new UserEventRegistersModel();
        $userModel = new UserModel();
        $userId = $userModel->getIdUserByEmail(session()->get('email'));


        $events = $userEventModel->getEventsByUserId($userId[0]->id);

        $data = [
            'title' => 'Your Events',
            'events' => $events
        ];

        return view('pages/user/events/events_registered', $data);
    }

    public function history()
    {
        $userEventModel = new UserEventRegistersModel();
        $userModel = new UserModel();
        $userId = $userModel->getIdUserByEmail(session()->get('email'));


        $events = $userEventModel->getEventsByUserId($userId[0]->id, 1);

        $data = [
            'title' => 'History Events',
            'events' => $events
        ];
        return view('pages/user/events/history', $data);
    }

    public function changeDateFormat(string $date)
    {
        $originalFormat = 'Y-m-d';

        $originalTime = Time::createFromFormat($originalFormat, $date);

        $formattedDate = $originalTime->format('d M Y');

        return $formattedDate;
    }
}
