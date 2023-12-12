<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventCollaboratorModel;
use App\Models\EventModel;
use App\Models\UserEventRegistersModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

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

    public function edit(int $id)
    {
        helper(['form']);
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $eventModel = new EventModel();
        $event = $eventModel->getEventById($id);
        if (!$event) {
            return redirect()->to(base_url('/events/manage'))->with('error_message', 'Event tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Event',
            'categories' => $categories,
            'event' => $event[0],
            'validation' => \Config\Services::validation()
        ];

        return view('pages/user/collaborators/edit', $data);
    }

    public function update(int $id)
    {
        helper(['form']);
        $eventModel = new EventModel();
        if (!$this->validate('updateEventCollaborator')) {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAll();
            $event = $eventModel->getEventById($id);

            if (!$event) {
                return redirect()->to(base_url('/events/manage'))->with('error_message', 'Event tidak ditemukan');
            }

            $data = [
                'title' => 'Edit Event',
                'categories' => $categories,
                'event' => $event[0],
                'validation' => \Config\Services::validation()
            ];

            return view('pages/user/collaborator/edit', $data);
        }

        $event = $eventModel->find($id);
        $imageFile = $this->request->getFile('banner');
        $imageFileName = $imageFile->getRandomName();

        if ($imageFile->isValid()) {
            unlink(ROOTPATH . 'public/assets/' . $event->banner);
            $imageFile->move(ROOTPATH . 'public/assets/images/events/', $imageFileName);
            $event->banner = 'images/events/' . $imageFileName;
        }

        $validateData = $this->validator->getValidated();
        $event->name = $validateData['name'];
        $event->description = $validateData['description'];
        $event->target_audience = $validateData['target_audience'];
        $event->quota = $validateData['quota'];
        $event->event_type = $validateData['event_type'] == '0' ? false : true;
        $event->link = $this->request->getPost('link');
        $event->price = $validateData['price'];
        $event->date = $validateData['date'];
        $event->country = $validateData['country'];
        $event->province = $validateData['province'];
        $event->city = $validateData['city'];
        $event->postal_code = $validateData['postal_code'];
        $event->street = $validateData['street'];
        $event->host = $validateData['host'];
        $event->host_email = $validateData['host_email'];
        $event->category_id = $validateData['category_id'];

        $eventModel->save($event);
        return redirect()->to(base_url('/events/manage'))->with('success_message', 'Berhasil mengubah event');
    }

    public function approveUsers(int $id)
    {
        helper(['number']);
        $eventModel = new EventModel();
        $event = $eventModel->find($id);
        $userEventModel = new UserEventRegistersModel();
        $users = $userEventModel->getUsersbyEventId($id);

        $data = [
            'title' => 'Approve Users',
            'event' => $event,
            'usersEvent' => $users,
        ];

        return view('pages/user/collaborators/approve', $data);
    }

    public function accept(int $id)
    {
        $userEventModel = new UserEventRegistersModel();
        $userEvent = $userEventModel->find($id);

        if (!$userEvent) {
            $response = [
                'status' => 'error',
                'message' => 'User gagal disetujui, id tidak ditemukan'
            ];
            echo json_encode($response);
            exit;
        }

        $userEvent->status = 1;

        $userEventModel->update($id, $userEvent);

        $response = [
            'status' => 'success',
            'message' => 'User berhasil disetujui'
        ];


        return json_encode($response);
    }

    public function deny(int $id)
    {
        $userEventModel = new UserEventRegistersModel();
        $userEvent = $userEventModel->find($id);

        if (!$userEvent) {
            $response = [
                'status' => 'error',
                'message' => 'User gagal ditolak, id tidak ditemukan'
            ];
            echo json_encode($response);
            exit;
        }

        $userEventModel->delete($id);

        $response = [
            'status' => 'success',
            'message' => 'User berhasil ditolak'
        ];


        return json_encode($response);
    }
}
