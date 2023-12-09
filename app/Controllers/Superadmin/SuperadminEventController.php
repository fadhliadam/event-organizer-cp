<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\EventCollaboratorModel;
use App\Models\EventModel;
use App\Models\UserModel;

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
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $data = [
            'title' => 'New Event',
            'validation' => \Config\Services::validation(),
            'categories' => $categories
        ];

        return view('pages/superadmin/events/new', $data);
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
    
            return view('pages/superadmin/events/new', $data);
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
        
        $event_id = $eventModel->getEvents();
        $event_id = $event_id[0]->id; // get event most new

        if($validateData['collaborator'] && $this->request->getPost('collaborator')) {
            $collaborator_id = $userModel->where('email', $validateData['collaborator'])->first();
            $collaborator = new \App\Entities\EventCollaboratorEntity();
            $collaborator->user_id = $collaborator_id->id;
            $collaborator->event_id = $event_id;

            $collaboratorModel = new EventCollaboratorModel();
            $collaboratorModel->save($collaborator);
        }
        
        return redirect()->to(base_url('/superadmin/events'))->with('success_message', 'Berhasil menambahkan event');
    }   

    public function edit(int $id)
    {
        helper(['form']);
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        
        $eventModel = new EventModel();
        $event = $eventModel->getEventById($id);
        if(!$event) {
            return redirect()->to(base_url('/superadmin/events'))->with('error_message', 'Event tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Event',
            'categories' => $categories,
            'event' => $event[0],
            'validation' => \Config\Services::validation()
        ];

        return view('pages/superadmin/events/edit', $data);
    }

    public function update(int $id) 
    {
        helper(['form']);
        $eventModel = new EventModel();
        if(! $this->validate('updateEvent')) {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAll();
            $event = $eventModel->getEventById($id);
            
            if(!$event) {
                return redirect()->to(base_url('/superadmin/events'))->with('error_message', 'Event tidak ditemukan');
            }

            $data = [
                'title' => 'Edit Event',
                'categories' => $categories,
                'event' => $event[0],
                'validation' => \Config\Services::validation()
            ];

            return view('pages/superadmin/events/edit', $data);
        }

        $event = $eventModel->withDeleted()->find($id);
        $imageFile = $this->request->getFile('banner');
        $imageFileName = $imageFile->getRandomName();

        if($imageFile->isValid()) {
            unlink(ROOTPATH.'public/assets/'.$event->banner);
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
        
        if($event->hasChanged()) {
            $oldEvent = $eventModel->getEventById($id)[0];
            $collaboratorModel = new EventCollaboratorModel();
            $userModel = new UserModel();
            $collaborator = new \App\Entities\EventCollaboratorEntity();
            
            if(! is_null($oldEvent->collaborator)) {
                $collaborator_user_id = $userModel->getIdUserByEmail($oldEvent->collaborator)[0];
                $collaborator_user_id = $collaborator_user_id->id;
                $checkExistCollaborator = $collaboratorModel->where(['user_id' => $collaborator_user_id, 'event_id' => $event->id])->first();
                if($validateData['collaborator'] && $this->request->getPost('collaborator')) {
                    $collaborator_user_id_new = $userModel->getIdUserByEmail($validateData['collaborator'])[0];
                    if($checkExistCollaborator) {
                        $collaboratorModel->update($checkExistCollaborator->id, ['user_id' => $collaborator_user_id_new->id]);
                    } else {
                        $collaborator->user_id = $collaborator_user_id_new;
                        $collaborator->event_id = $event->id;
            
                        $collaboratorModel->save($collaborator);
                    }
                } else {
                    $collaboratorModel->delete($checkExistCollaborator->id);
                }

                $eventModel->save($event);
                return redirect()->to(base_url('/superadmin/events'))->with('success_message', 'Berhasil mengubah event');
            } else {

                $collaborator_user_id = $userModel->getIdUserByEmail($validateData['collaborator'])[0];
                $collaborator_user_id = $collaborator_user_id->id;
                $collaborator->user_id = $collaborator_user_id;
                $collaborator->event_id = $event->id;
                $collaboratorModel->save($collaborator);

                $eventModel->save($event);
                return redirect()->to(base_url('/superadmin/events'))->with('success_message', 'Berhasil mengubah event');
            }
        }

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
