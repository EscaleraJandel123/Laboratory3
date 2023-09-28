<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{

  private $product;
  private $user;

  public function __construct()
  {
    $this->product = new \App\Models\ProductModel();
    $this->user = new \App\Models\UserModel();
  }
  public function productDetails($id)
  {
    $product = $this->product->find($id);
    if ($product) {
      $data = [
        'product' => $product
      ];
      return view('productDetails', $data);
    } else {
      return redirect()->to('/home');
    }
  }

  public function home()
  {
    $data = [
      'items' => $this->product->findAll()
    ];
    return view('index', $data);
  }

  public function login()
  {
    $session = session();
    if (isset($_POST['login'])) {
      $email = $this->request->getVar('email');
      $password = $this->request->getVar('password');
      $check = $this->user->where('email', $email)->where('password', $password)->first();
      if ($check) {
        $data = [
          'email' => $check['email'],
          'isLoggedIn' => TRUE
        ];
        $session->set($data);
        return redirect()->to('/admin');
      }

    } else {
      return view('login');
    }
  }
  
  public function index()
  {
    //
  }
}