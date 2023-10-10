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
      $allProducts = $this->product->findAll();
      
      // Limit the products to 3 items
      $limitedProducts = array_slice($allProducts, 0, 6);
      
      $data = [
          'items' => $limitedProducts
      ];
      
      return view('index', $data);
  }
  
  public function about()
  {
    return view('about');
  }

  public function fruits()
  {
    $data = [
      'items' => $this->product->findAll()
    ];
    return view('fruits', $data);
  }
}