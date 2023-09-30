<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SAController extends BaseController
{
  private $product;
  public function __construct()
  {
    $this->product = new \App\Models\ProductModel();
  }
  public function add()
  {
    return view('add-items');
  }
  public function edit($id)
  {
    $data = [
      'items' => $this->product->findAll(),
      'pro' => $this->product->where('id', $id)->first(),
    ];

    if (!$data['pro']) {
      echo 'ERORR';
    }
    return view('admin', $data);
  }
  public function delete($id)
  {
    $this->product->delete($id);
    return redirect()->to('/admin');
  }

  public function save()
  {
    $id = $_POST['id'];
    $data = [
      // 'image' => $this->request->getFile('image'),
      'name' => $this->request->getVar('name'),
      'description' => $this->request->getVar('description'),
      'price' => $this->request->getVar('price'),
    ];

    if ($id != null) {
      $this->product->set($data)->where('id', $id)->update();
    } else {
      $this->product->save($data);
    }
    return redirect()->to('/admin');
  }

  //return data from the items
  public function admin()
  {
    $data = [
      'items' => $this->product->findAll()
    ];
    return view('admin', $data);
  }

  public function index()
  {
    //
  }
}