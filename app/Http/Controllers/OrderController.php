<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

USE App\Models\order;
use App\Models\orderDetail;

class OrderController extends Controller
{
    //1. READ
    public function showOrders(){
        $rs = order::join('users','users.id','=','orders.id')
            ->orderBy('orders.created_at','desc')
            ->get(['orders.*', 'users.name']);

        return view ('Oder.admin.OrderList') -> with (['rs' => $rs]);
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

        return view ('Oder.user.myorder') -> with (['rs' => $rs]);
    }
    public function updateOrderProcess(Request $rqst, $id){}

    //4. DELETE

    // public function deleteOrder($O_id)
    // {
    //     $this->O_id = $O_id;
    // }

    // public function destroyOrder($O_id) {
    //     $data = Order::find($this->O_id);
    //     Order::destroyOrder($O_id);
    //     return redirect('admin.order.Orderlist')->with('flash_message', 'order cancel');
    // }
}
