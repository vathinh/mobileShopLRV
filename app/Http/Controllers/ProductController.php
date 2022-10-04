<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\product;

class ProductController extends Controller
{
    //1. READ
    public function showProducts(){}

    //2. CREATE
    public function createNewProduct(){}
    public function createNewProductProcess(Request $rqst){}

    //3. UPDATE
    public function updateProduct(){}
    public function updateProductProcess(Request $rqst, $id){}

    //4. DELETE
    public function deleteProduct($id) {}
}
