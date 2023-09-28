<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
class UserController extends BaseController
{
    /*public function register()
    {
        helper(['form']);
        $rules = [
            'eamil' => 'required|min_length[4]max_lenght[100]valid_email|is_unique[user.email]',
            'password' => 'required|min_length[4]max_lenght[50]',
            'confirmpassword' =>'match[password]'
        ];
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'email' => $this->request->getVar('email'),
                'password' => password_hash( $this->request->getVar('email'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/signup');
        }else{
            $data['validation'] = $this->validator;
            echo view('/signup' ,$data);
        }
    }*/

    public function index()
    {
        //
    }
}
