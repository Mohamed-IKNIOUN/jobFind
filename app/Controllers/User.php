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

    // forget password process
    public function forgetPassword()
    {
        return view('auth/forget_password');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');

        if (!$email) {
            return redirect()->back()->with('error', 'Email field is required');
        } else {
            $validationRules = [
                'email' => 'required|valid_email',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'There is no user with this email.');
        }

        // Generate a reset token
        $token = bin2hex(random_bytes(32));

        // Save the token in the database
        $db = \Config\Database::connect();
        $db->query("INSERT INTO password_resets (email, token, created_at) VALUES (?, ?, ?)", [
            $email,
            $token,
            date('Y-m-d H:i:s'),
        ]);

        // Send email
        $resetLink = base_url("/resetPassword/$token");
        $emailService = \Config\Services::email();
        $emailService->setFrom('jobfind.310@gmail.com', 'job Find');
        $emailService->setTo($email);
        $emailService->setSubject('Password Reset');
        $emailService->setMessage("Click the link to reset your password: <a href=\"$resetLink\">$resetLink</a>");

        if ($emailService->send()) {
            return redirect()->back()->with('success', 'Reset link sent to your email, the link is available for 1 hour.');
        } else {

            return redirect()->back()->with('error', 'Error sending email.');
        }
    }

    public function resetPassword($token)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM password_resets WHERE token = ?", [$token]);
        $resetData = $query->getRow();

        if (!$resetData) {
            return redirect()->to('/forget-password')->with('error', 'Invalid token.');
        } elseif ((strtotime($resetData->created_at) < time() - 3600)) {
            return redirect()->to('/forget-password')->with('error', 'Expired token.');
        }

        return view('auth/reset-password', ['email' => $resetData->email]);
    }

    public function processResetPassword()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPassword');

        if ($password != $confirmPassword) {
            return redirect()->back()->withInput()->with('error', 'Passwords doesnt match !');
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userModel = new UserModel();
            $userModel->where('email', $email)->set(['password' => $hashedPassword])->update();


            $db = \Config\Database::connect();
            $db->query("DELETE FROM password_resets WHERE email = ?", [$email]);

            return redirect()->to('/login')->with('success', 'Password reset successfully.');
        }
    }

    public function profile()
    {
        $user = new UserModel();

        $profileInfos = $user->getUserProfile();

        $data = [
            'profile' => $profileInfos,
            'title' => 'Profile'
        ];

        return view('profile/profile_overview', $data);
    }

    public function profileEdit()
    {
        $user = new UserModel();

        $userInfo = $user->getUserProfile();

        $data = [
            'userInfo' => $userInfo,
            'title' => 'Profile | edit'
        ];

        return view('profile/update', $data);
    }

    public function editProfilePost()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');

        if (!$username || !$email) {
            return redirect()->back()->withInput()->with('error', 'All fields are required');
        }


        if (session()->get('user_type') == 'employee') {

            $fullName = $this->request->getPost('full_name');
            $dateBirth = $this->request->getPost('date_birth');
            $phone = $this->request->getPost('phone');
            $address = $this->request->getPost('address');
            $education = $this->request->getPost('education');
            $experience = $this->request->getPost('experience');
            $skills = $this->request->getPost('skills');
            $file = $this->request->getFile('profile_picture');
            $profilePicture = null;

            if (empty($fullName) || empty($dateBirth) || empty($phone) || empty($address) || empty($education) || empty($experience) || empty($skills)) {
                return redirect()->back()->withInput()->with('error', 'All fields are required');
            }

            $profileModel = new ProfileModel();

            if ($file && $file->isValid() && !$file->hasMoved()) {

                $profilePicture = $file->getRandomName();
                $file->move(FCPATH . 'images', $profilePicture);
            }

            $profilePath = '';
            if ($profilePicture) {
                $profilePath = '/images/' .  $profilePicture;
            } else {
                $profileNoPicUpdated = $profileModel->where('user_id', session()->get('user_id'))->first();
                $profilePath = $profileNoPicUpdated['profile_picture'];
            }


            $profileData = [
                'profile_picture' => $profilePath,
                'full_name' => $fullName,
                'date_birth' => $dateBirth,
                'phone' => $phone,
                'address' => $address,
                'education' => $education,
                'experience' => $experience,
                'skills' => $skills
            ];

            $profile = $profileModel->where('user_id', session()->get('user_id'))->update(NULL, $profileData);
        }

        $userModel = new UserModel();

        $data = [
            'username' => $username,
            'email' => $email
        ];

        $user = $userModel->update(session()->get('user_id'), $data);

        return redirect()->back()->with('success', 'Profile credentials updated successfully ');
    }
}
