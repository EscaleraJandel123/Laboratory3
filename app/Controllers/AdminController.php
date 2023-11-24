<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function login()
    {
        helper(['form']);
        $data = [];
        return view('login');
    }

    public function register()
    {
        helper(['form']);
        $data = [];
        return view('signup');
    }

    public function authreg()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[1]|max_length[100]',
            'password' => 'required|min_length[1]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy the user's session data
        return redirect()->to('/home'); // Redirect to the login page or any other page you prefer
    }

    public function authlog()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [

                    'id' => $data['id'],
                    'username' => $data['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');

            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return view('login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return view('login');
        }
    }

    //     public function forgotPassword()
// {
//     helper(['form']);
//     $data = [];
//     return view('forgot_password', $data);
// }

    // public function resetPassword()
// {
//     helper(['form']);
//     $rules = [
//         'username' => 'required|min_length[1]|max_length[100]',
//     ];

    //     if ($this->validate($rules)) {
//         $userModel = new UserModel();
//         $username = $this->request->getVar('username');
//         $password = $this->request->getVar('password');

    //         $userData = $userModel->where('username', $username)->first();
//         if ($userData) {
//             // Generate a random password
//             $tempPassword = bin2hex(random_bytes(8)); // Example of a temporary password

    //             // Update the user's password in the database
//             $userModel->update($userData['id'], ['password' => password_hash($tempPassword, PASSWORD_DEFAULT)]);

    //             // Send an email to the user with the temporary password or a password reset link
//             // You can use PHP's mail function or a library like PHPMailer or other email service providers

    //             // Redirect the user to a page to inform them about the password reset
//             return redirect()->to('/login')->with('success', 'Password reset instructions sent to your email.');
//         } else {
//             // If the username does not exist, inform the user
//             return redirect()->to('/forgot_password')->with('error', 'Username does not exist.');
//         }
//     } else {
//         $data['validation'] = $this->validator;
//         echo view('forgot_password', $data);
//     }
// }

    public function index()
    {
        //
    }
}