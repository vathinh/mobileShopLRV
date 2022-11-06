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
            ->get(['orders.*', 'users.name']);

        return view ('Oder.admin.OrderList') -> with (['rs' => $rs]);
    }

    
    

    //3. UPDATE
    public function vieworderuser(){
        $rs = orderDetail::all();
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
