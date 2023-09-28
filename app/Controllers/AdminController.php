<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    private $product;
  public function __construct()
  {
    $this->product = new \App\Models\ProductModel();
  }
    public function admin()
    {
        $data = [
            'items' => $this->product->findAll()
          ];
          return view('admin', $data);
    }
}
