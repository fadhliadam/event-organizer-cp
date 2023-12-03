<?php

namespace App\Controllers;

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
        $data['link'] = $this->googleClient->createAuthUrl();
        return view('pages/user/login_page', $data);
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
                $entity->role_id = 1;

                $model = new UserModel();
                $user = $model->where('email', $entity->email)->find();
                if ($user) {
                    return redirect()->to('/dashboard');
                } else {
                    $model->save($entity);
                    return redirect()->to('/dashboard');
                }
            }
        } else {
            return redirect()->to('/login');
        }
    }
}
