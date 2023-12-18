<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Firebase\JWT\JWT;

helper('cookie');

class Login extends BaseController
{
    public function index()
    {
        return view('pages/login');
    }

    public function loginAction()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            session()->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->to('/login');
        }

        if (!password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/login');
        }

        $key = getenv("JWT_SECRET");

        $iat = time();
        $exp = $iat + (60 * 60 * 3);

        $payload = [
            "iss" => "ci4-jwt",
            "sub" => "login_token",
            "iat" => $iat,
            "exp" => $exp,
            "data" => [
                "id" => $user['id'],
                "fullName" => $user['fullName'],
                "email" => $user['email'],
                "role" => $user['role'],
                "phoneNumber" => $user['phoneNumber'],
            ]
        ];

        $token = JWT::encode($payload, $key, "HS256");

        session()->set('user_id', $user['id']);
        session()->set('user_full_name', $user['fullName']);
        session()->set('user_email', $user['email']);
        session()->set('user_phone_number', $user['phoneNumber']);

        setcookie('login_token', $token, time() + 3600, "/"); // 3600 seconds = 1 hour

        if (isset($_COOKIE["login_token"])) {
            echo $_COOKIE["login_token"];
        } else {
            echo "Cookie 'login_token' is not set!";
        }

        return redirect()->to('/');
    }

    // login for hoteloka, accept email and password from request body
    public function loginActionProvider()
    {
        // get request body
        $body = $this->request->getJSON();

        // get email and password from request body
        $email = $body->email;
        $password = $body->password;

        // check if email and password is empty
        if (empty($email) || empty($password)) {
            // return error response
            return $this->response->setJSON(['error' => 'Email and password are required'])->setStatusCode(400);
        }

        // get user by email
        $userModel = new UserModel();

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->response->setJSON(['error' => 'Account not found'])->setStatusCode(404);
        }

        // check if password is correct
        if (!password_verify($password, $user['password'])) {
            return $this->response->setJSON(['error' => 'Email or password is incorrect'])->setStatusCode(400);
        }

        // generate JWT token
        $key = getenv("JWT_SECRET");

        $iat = time();
        $exp = $iat + (60 * 60 * 3);

        $payload = [
            "iss" => "ci4-jwt",
            "sub" => "login_token",
            "iat" => $iat,
            "exp" => $exp,
            "data" => [
                "id" => $user['id'],
                "fullName" => $user['fullName'],
                "email" => $user['email'],
                "role" => $user['role'],
                "phoneNumber" => $user['phoneNumber'],
            ]
        ];

        try {
            $token = JWT::encode($payload, $key, "HS256");
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => 'Failed to generate token'])->setStatusCode(500);
        }

        return $this->response->setJSON(['data' => $user, 'token' => $token])->setStatusCode(200);
    }

    // logout delete cookie
    public function logout()
    {
        session()->remove('user_id');
        session()->remove('user_full_name');
        session()->remove('user_email');
        session()->remove('user_phone_number');
        setcookie('login_token', '', time() - 3600, "/"); // 3600 seconds = 1 hour
        return redirect()->to('/login');
    }
}
