<?php


namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfileModel;

class User extends BaseController
{

    // registration handling
    public function register()
    {
        return view('forms/register', ['title' => 'Register']);
    }

    function registerPost()
    {

        $userModel = new UserModel();
        $profileModel = new ProfileModel();

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');


        if (!$email || !$password || !$username || !$role) {
            return redirect()->to('/register')->withInput()->with('error', 'All fields are required');
        } else {
            $validationRules = [
                'email' =>    'required|valid_email',
                'password' => 'required|min_length[8]',
                'username' => 'required|min_length[8]',
                'role' =>     'required|in_list[employee,employer]',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
            }

            $isFound = $userModel->where('email', $email)->first();

            if ($isFound) {
                return redirect()->to('register')->withInput()->with('error', 'There is already a user with this email.');
            } elseif (!$isFound) {

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'email' => $email,
                    'password' => $hashedPassword,
                    'username' => $username,
                    'role' => $role
                ];

                $userModel->insert($data);

                if ($role === 'employee') {
                    $lastInsertedID = $userModel->getInsertID();
                    $profileModel->insert(['user_id' => $lastInsertedID]);
                }
                return redirect()->to('/login')->with('success', 'Your account has been created successfully !');
            }
        }
    }







    // login handling
    public function login()
    {
        return view('forms/login', ['title' => 'login']);
    }

    function loginPost()
    {

        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email || !$password) {
            return redirect()->to('/login')->withInput()->with('error', 'All fields are required');
        } else {
            $validationRules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
            }

            $user = $userModel->where('email', $email)->first();

            //user found
            if ($user) {

                $verifyPassword = password_verify($password, $user['password']);

                if ($verifyPassword) {
                    $session = session();

                    $session->set([
                        'user_id' => $user['id'],
                        'user_type' => $user['role'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'isLogged' => true,
                    ]);

                    return redirect()->to('/')->with('success', 'You are logged successfully !');
                } else {

                    return redirect()->to('/login')->withInput()->with('error', 'incorrect Password');
                }
            } else {

                return redirect()->to('/login')->withInput()->with('error', 'No user found with this email');
            }
        }
    }






    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You logged out !');
    }



    public function contact()
    {
        return view('contact');
    }

    public function termsOfUse()
    {
        return view('termOfUse', ['title' => 'Terms of use']);
    }

    public function about()
    {
        return view('about', ['title' => 'About us']);
    }
}