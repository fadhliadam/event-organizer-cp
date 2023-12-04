<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Google_Client;

class Login extends BaseController
{
    protected $googleClient;
    protected $user;

    public function __construct()
    {
        $this->googleClient = new Google_Client();

        $clientId = getenv('GOOGLE_CLIENT_ID');
        $clientSecret = getenv('GOOGLE_CLIENT_SECRET');

        $this->googleClient->setClientId($clientId);
        $this->googleClient->setClientSecret($clientSecret);
        $this->googleClient->setRedirectUri('http://localhost:8080/login/process');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'link' => $this->googleClient->createAuthUrl(),
            'validation' => \Config\Services::validation()
        ];
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/dashboard'));
        }
        return view('pages/user/login', $data);
    }

    public function process()
    {
        if (isset($_GET['code'])) {
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            if (!isset($token['error'])) {
                $this->googleClient->setAccessToken($token['access_token']);
                $googleService = new \Google\Service\Oauth2($this->googleClient);
                $data = $googleService->userinfo->get();

                $entity = new \App\Entities\UserEntity();
                $entity->id_google = $data['id'];
                $entity->username = $data['givenName'];
                $entity->email = $data['email'];
                $entity->image = $data['picture'];
                $entity->role_id = 3;

                $dataSession = $entity->toArray() + [
                    'logged_in' => true
                ];

                $model = new UserModel();
                $user = $model->where('email', $entity->email)->find();
                if ($user) {
                    session()->set($dataSession);
                    return redirect()->to(base_url('/dashboard'));
                } else {
                    $model->save($entity);
                    session()->set($dataSession);
                    return redirect()->to(base_url('/dashboard'));
                }
            }
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        $response = [
            'status' => 'success',
            'message' => 'Berhasil logout'
        ];

        echo json_encode($response);
    }
}
