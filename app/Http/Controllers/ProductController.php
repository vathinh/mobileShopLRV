<?php

namespace App\Http\Controllers;

use App\Models\category;
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
        $rs = product::join('category', 'category.C_id', '=', 'products.C_id')
            ->get(['products.*', 'category.C_name']);
        return view('adminProduct.readProduct')->with(['rs' => $rs]);
    }

    public function admin_productDetails($id)
    {
        $product = product::where('P_id', $id)->first();
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);
        $imageName = time().'.'.$rqst->image->extension();
        $rqst->image->move(public_path('image'), $imageName);
        // $image = $rqst->file('txtPath');
        // $path = $image->move('image/', $image->getClientOriginalName());
        $id         = $rqst->input('txtID');
        $c_id = $rqst->input('txtC_id');
        $name       = $rqst->input('txtName');
        $price      = $rqst->input('txtPrice');
        $storage    = $rqst->input('Storage');
        $color      = $rqst->input('Color');
        $qty        = $rqst->input('txtQty');
        product::create([
            'P_id'      => $id,
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
        $name   = $rqst->input('txtName');
        $price  = $rqst->input('txtPrice');
        $storage = $rqst->input('Storage');
        $color  = $rqst->input('Color');
        $qty    = $rqst->input('txtQty');
        product::where('P_id', $id)
            ->update([
                'P_name'    => $name,
                'P_price'   => $price,
                'P_storage' => $storage,
                'P_color'   => $color,
                'P_quantity'     => $qty
            ]);
        return redirect()->action('ProductController@showProducts');
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
    public function productDetails()
    {
        $products = Product::all();
        return view('productDetails', compact('products'));
    }
    public function ushowProducts($id)
    {
        $product = product::where('P_id', $id)->first();
        return view('productDetails')->with(['product' => $product]);
    }
    
        
 


    // Cart and checkout


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
        $product = Product::where('P_id', $id)->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
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
        if ($request->id && $request->quantity) {
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
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
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


    //2. CREATE OrdersDetails
   
    public function createOrderProc(Request $rqst, $O_id){
       
        $O_delieveryAddress = $rqst -> input('txtAddress');
        
        

        order::where('O_id', $O_id)
        -> update([
            'O_delieveryAddress'    =>  $O_delieveryAddress
            
        ]);
        
       
   
        $cart = session()->get('cart', []);
        
        foreach(session('cart') as $id => $details) {
            orderDetail::create([
                'P_id'          =>$details['P_id'],
                'O_id'          => $O_id,
                'QD_quantity'    => $details['quantity']
                
            ]);
        }
        return redirect() -> action('ProductController@index');
    }


   
}
   
