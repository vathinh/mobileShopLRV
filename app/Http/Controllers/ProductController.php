<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //1. READ

    public function showProducts()
    {
        $rs = product::join('categories', 'categories.C_id', '=', 'products.C_id')
            ->get(['products.*', 'categories.C_name']);
        return view('adminProduct.readProduct')->with(['rs' => $rs]);
    }

    public function admin_productDetails($id)
    {   $product = product::join('categories', 'categories.C_id', '=', 'products.C_id')
        ->get(['products.*', 'categories.C_name', 'categories.C_desc'])
        ->where('P_id', $id)->first();
        return view('adminProduct.productDetails', ['product' => $product]);
    }

    //2. CREATE
    public function createNewProduct()
    {
        return view('adminProduct.createProduct');
    }


    public function createNewProductProcess(Request $rqst)
    {   
        $rqst->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:20048',
        ]);
        $name       = $rqst->input('txtName');
        $imageName = $name. '.' . $rqst->image->extension();
        $rqst->image->move(public_path('image'), $imageName);
        $c_id       = $rqst->input('txtC_id');  
        $price      = $rqst->input('txtPrice');
        $storage    = $rqst->input('Storage');
        $color      = $rqst->input('Color');
        $qty        = $rqst->input('txtQty');
        // 'P_id'      => $id,
        product::create([
            'C_id'      => $c_id,
            'P_name'    => $name,
            'P_price'   => $price,
            'P_storage' => $storage,
            'P_color'   => $color,
            'P_quantity' => $qty,
            'P_imgPath' => $imageName
        ]);
        return redirect()->action('ProductController@showProducts');
    }

    //3. UPDATE
    public function updateProduct($id)
    {
        $rs = product::where('P_id', $id)->first();
        return view('adminProduct.updateProduct', ['rs' => $rs]);
    }
    public function updateProductProcess(Request $rqst, $id)
    {   
        $rqst->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:20048',
        ]);
    
        $data = array();
        $data['P_name'] = $rqst->input('txtName');
        $data['P_price'] = $rqst->input('txtPrice');
        $data['P_storage'] = $rqst->input('Storage');
        $data['P_color'] = $rqst->input('Color');
        $data['P_quantity'] = $rqst->input('txtQty');
        $get_image = $rqst->file('image');
        if($get_image){
            $get_name_picture = $data['P_name'].'.jpg';
            $data['P_imgPath'] = $get_name_picture;
            $get_image->move('image/',$get_name_picture);
        }

        DB::table('products')->where('P_id', intval($id))->update(
            $data
        );
        if($rqst->all()){
            return redirect()->action('ProductController@showProducts')->with('success',"Update product successfully!");
        }
    }

    //4. DELETE
    public function deleteProduct($id)
    {
        product::where('P_id', $id)->delete();
        return redirect()->action('ProductController@showProducts');
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::all();
        return view('newWelcome', compact('products'));
    }

    

    public function ushowProducts($id){
        $product = product::join('categories', 'categories.C_id', '=', 'products.C_id')
        ->get(['products.*', 'categories.C_name', 'categories.C_desc'])
        ->where('P_id', $id)->first();
        $feedback = Feedback::all()->where('P_id', $id);
        return view ('productDetails') -> with (['product' => $product]) ->with ('feedback',$feedback);
    }





   
}
   
