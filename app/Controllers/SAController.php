<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class SAController extends BaseController
{
  private $product;
  public function __construct()
  {
    $this->product = new ProductModel();
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

  // public function save()
  // {
  //   $id = $_POST['id'];
  //   $data = [
  //     'image' => $this->request->getFile('image'),
  //     'name' => $this->request->getVar('name'),
  //     'description' => $this->request->getVar('description'),
  //     'price' => $this->request->getVar('price'),
  //   ];

  //   if ($id != null) {
  //     $this->product->set($data)->where('id', $id)->update();
  //   } else {
  //     $this->product->save($data);
  //   }
  //   return redirect()->to('/admin');
  // }
  public function save()
  {
      $id = $this->request->getPost('id');
      $data = [
          'name' => $this->request->getPost('name'),
          'description' => $this->request->getPost('description'),
          'price' => $this->request->getPost('price'),
      ];
  
      // Check if an image file was uploaded
      if ($imageFile = $this->request->getFile('image')) {
          // Generate a unique name for the uploaded image
          $imageName = $imageFile->getRandomName();
  
          // Set the path to the upload directory
          $uploadPath = WRITEPATH . 'uploads/'; // You can change this path
  
          // Move the uploaded image to the upload directory
          if ($imageFile->move($uploadPath, $imageName)) {
              // Image upload successful, store the image filename in the database
              $data['image'] = $imageName;
          } else {
              // Image upload failed, handle the error
              $error = $imageFile->getError();
              // You can log or display the error message
          }
      }
  
      if (!empty($id)) {
          // Update the existing record
          $this->product->set($data)->where('id', $id)->update();
      } else {
          // Insert a new record
          $this->product->insert($data);
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
    
}

}

