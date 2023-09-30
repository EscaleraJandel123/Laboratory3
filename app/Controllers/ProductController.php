<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{

  private $product;
  public function __construct()
  {
    $this->product = new \App\Models\ProductModel();
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
  //Return datas
  public function home()
  {
    $data = [
      'items' => $this->product->findAll()
    ];
    return view('index', $data);
  }
  //admin pannel
  // public function admin()
  // {
  //   $data = [
  //     'items' => $this->product->findAll()
  //   ];
  //   return view('admin', $data);
  // }

}