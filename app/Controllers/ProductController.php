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
  public function home()
  {
    $data = [
      'items' => $this->product->findAll()
    ];
    return view('index', $data);
  }

    public function index()
    {
        //
    }
}
