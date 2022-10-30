<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
USE App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        product::where('P_id', $id) -> delete();
        return redirect() -> action('ProductController@showProducts');
    }

    
    
      /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(){
        $products = Product::all();
        return view('newWelcome', compact('products'));
    
  
    }
    
        
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::where('P_id', $id) ->first();
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "P_id" => $id,
                "name" => $product->P_name,
                "quantity" => 1,
                "price" => $product->P_price,
                "image" => $product->P_imgPath
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout($id) {
        
       
        order::create([
            'id' => $id
        ]);
        $od = DB::table('orders')->latest('created_at')->first();
        return view('checkout')-> with (['od' => $od]);
    }


    //2. CREATE Orders
   
    public function createOrderProc(Request $rqst){
       
        $id         = Auth::user()->id;
        $O_delieveryAddress = $rqst -> input('txtAddress');
        
        $P_id       =  $rqst -> input('txtProdcutId');
        $QD_quantity = $rqst -> input('txtProductQuantity');
        $order = order::all();
        

       
        $O_id       = $rqst -> input('txtOId');
        orderDetail::create([
           
            
            'P_id'          => $P_id,
            'O_id'          => $O_id,
            'QD_quantity'    => $QD_quantity
        ]);

        return redirect() -> action('ProductController@showProducts');
    }
}