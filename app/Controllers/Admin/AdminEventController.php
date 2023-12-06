<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventModel;
use App\Models\UserModel;
use CodeIgniter\CLI\Console;

class AdminEventController extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $events = $eventModel->where('owner', session('id'))->findAll();
        $data = [
            'title' => 'Events',
            'events' => $events,
        ];
        return view('pages/admin/events/index', $data);
    }

    public function new()
    {
        helper(['form']);
        $userModel = new UserModel();
        $users = $userModel->where('role_id', 3)->findAll();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $data = [
            'title' => 'New Event',
            'validation' => \Config\Services::validation(),
            'categories' => $categories,
            'users' => $users,
        ];
        return view('pages/admin/events/new', $data);
    }

    public function store()
    {
        helper(['form']);
        if(! $this->validate('addEvent')) {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAll();

            $data = [
                'title' => 'New Event',
                'validation' => $this->validator,
                'categories' => $categories
            ];
    
            return view('pages/admin/events/new', $data);
        }

        $event = new \App\Entities\EventEntity();

        $imageFile = $this->request->getFile('banner');
        $imageFileName = $imageFile->getRandomName();

        if($imageFile->isValid()) {
            $imageFile->move(ROOTPATH.'public/assets/images/events/', $imageFileName);
            $event->banner = 'images/events/'.$imageFileName;
        }

        $validateData = $this->validator->getValidated();
        $event->name = $validateData['name'];
        $event->description = $validateData['description'];
        $event->target_audience = $validateData['target_audience'];
        $event->quota = $validateData['quota'];
        $event->event_type = $validateData['event_type'] == '0'? false : true;
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
        $event->required_approval = $this->request->getPost('required_approval') == 'on' ? true : false;
        $event->category_id = $validateData['category_id'];

        $eventOwner = $validateData['owner'];
        $userModel = new UserModel();
        $user = $userModel->where('email', $eventOwner)->first();
        $event->owner = $user->id;

        $eventModel = new EventModel();
        $eventModel->save($event);
        return redirect()->to(base_url('/admin/events'))->with('success_message', 'Berhasil menambahkan event');
    }
}
