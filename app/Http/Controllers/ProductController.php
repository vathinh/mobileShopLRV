<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\product;

class ProductController extends Controller
{
    //1. READ
    public function showProducts(){
        $rs = product::all();
        return view ('adminProduct.readProduct') -> with (['rs' => $rs]);
    }

    //2. CREATE
    public function createNewProduct(){
        return view('adminProduct.createProduct');
    }
    public function createNewProductProcess(Request $rqst){
        $id         = $rqst -> input('txtID');
        $name       = $rqst -> input('txtName');
        $price      = $rqst -> input('txtPrice');
        $storage    = $rqst -> input('Storage');
        $color      = $rqst -> input('Color');
        $qty        = $rqst -> input('txtQty');

        product::create([
            'p_id'      => $id,
            'p_name'    => $name,
            'p_price'   => $price,
            'p_storage' => $storage,
            'p_color'   => $color,
            'p_qty'     => $qty
        ]);

        return redirect() -> action('ProductController@showProducts');
    }

    //3. UPDATE
    public function updateProduct($id){
        $rs = product::where('p_id', $id) ->first();
        return view('adminProduct.updateProduct', ['rs' => $rs]);
    }
    public function updateProductProcess(Request $rqst, $id){
        $name   = $rqst -> input('txtName');
        $price  = $rqst -> input('txtPrice');
        $storage = $rqst -> input('Storage');
        $color  = $rqst -> input('Color');
        $qty    = $rqst -> input('txtQty');
        product::where('p_id', $id)
        -> update([
            'p_name'    => $name,
            'p_price'   => $price,
            'p_storage' => $storage,
            'p_color'   => $color,
            'p_qty'     => $qty
        ]);
        return redirect() -> action('ProductController@showProducts');
    }

    //4. DELETE
    public function deleteProduct($id) {
        product::where('p_id', $id) -> delete();
        return redirect() -> action('ProductController@showProducts');
    }
}
