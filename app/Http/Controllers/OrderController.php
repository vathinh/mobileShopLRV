<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;
use App\Models\product;


class OrderController extends Controller
{
    //1. READ
    public function showOrders(){
        $rs = order::join('users','users.id','=','orders.id')
            ->orderBy('orders.created_at','desc')
            ->get(['orders.*', 'users.name']);

        return view ('Order.Admin.OrderList') -> with (['rs' => $rs]);
    }

    public function acceptstatus($O_id)
    {

        $status = 1;
        order::where('O_id', $O_id) -> update([
            'O_status' => $status
        ]);
        return redirect()-> action ('OrderController@showOrders');
    }

    public function declinestatus($O_id)
    {

        $status = 2;
        order::where('O_id', $O_id) -> update([
            'O_status' => $status
        ]);
        return redirect()-> action ('OrderController@showOrders');
    }

     //2. ORDER USER
     public function vieworderuser($id){
        $rs = order::join('order_details','order_details.O_id','=','orders.O_id')
            -> join('products','products.P_id','=','order_details.P_id')
            ->where(['orders.id' => $id])
            ->orderBy('orders.created_at','desc')
            ->get(['orders.O_id','orders.id','products.P_imgPath', 'products.P_name','orders.created_at', 'order_details.QD_quantity','products.P_price','orders.O_status']);

        return view ('Order.User.myorder') -> with (['rs' => $rs]);
     }
    

    //3. UPDATE
    public function updateOrder(){}
    public function updateOrderProcess(Request $rqst, $id){}

    //4. DELETE
    public function deleteOrder($id) {}



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
