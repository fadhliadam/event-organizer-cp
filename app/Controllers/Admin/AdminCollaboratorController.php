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
        $collaborators = $collaboratorModel->getCollaborators();

        $data = [
            'title' => 'Collaborators',
            'collaborators' => $collaborators
        ];
        return view('pages/admin/collaborators/index', $data);
    }

    public function edit(int $id)
    {
        helper(['form']);

        $eventCollaboratorModel = new EventCollaboratorModel();
        $eventCollaborator = $eventCollaboratorModel->getCollaboratorById($id);
        if (!$eventCollaborator) {
            return redirect()->to(base_url('/admin/collaborators'))->with('error_message', 'Event Collaborator tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Collaborator',
            'eventCollaborator' => $eventCollaborator[0],
            'validation' => \Config\Services::validation()
        ];

        return view('pages/admin/collaborators/edit', $data);
    }

    public function update(int $id)
    {
        helper(['form']);
        $collaboratorModel = new EventCollaboratorModel();

        if (!$this->validate('updateEventCollaboratorAdmin')) {

            $collaborator = $collaboratorModel->getCollaboratorById($id);

            if (!$collaborator) {
                return redirect()->to(base_url('/admin/collaborators'))->with('error_message', 'Event Collaborator tidak ditemukan');
            }

            $data = [
                'title' => 'Edit Collaborator',
                'eventCollaborator' => $collaborator[0],
                'validation' => \Config\Services::validation()
            ];

            return view('pages/admin/collaborators/edit', $data);
        }
        $collaborator = $collaboratorModel->find($id);
        $validateData = $this->validator->getValidated();
        $userModel = new UserModel();
        if (!$collaborator) {
            return redirect()->to(base_url('/admin/collaborators'))->with('error_message', 'Event Collaborator tidak ditemukan');
        } else {
            $collaborator_user_id_new = $userModel->getIdUserByEmail($validateData['collaborator'])[0];
            $collaboratorModel->update($id, ['user_id' => $collaborator_user_id_new->id]);
            return redirect()->to(base_url('/admin/collaborators'))->with('success_message', 'Berhasil mengubah event collaborator');
        }
    }

    public function destroy(int $id)
    {
        $eventCollaboratorModel = new EventCollaboratorModel();
        $eventCollaborator = $eventCollaboratorModel->find($id);
        if (!$eventCollaborator) {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus event collaborator, id tidak ditemukan'
            ];
            echo json_encode($response);
            exit;
        }
        $response = [
            'status' => 'success',
            'message' => 'Berhasil menghapus event collaborator'
        ];
        $eventCollaboratorModel->where('id', $id)->delete();
        echo json_encode($response);
    }
}
