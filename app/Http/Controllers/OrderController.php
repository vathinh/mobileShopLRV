<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

USE App\Models\order;

class OrderController extends Controller
{
    //1. READ
    public function showOrders(){
        $rs = order::join('User','User.surname','=','order.id')
        ->join('orderDetail', 'orderDetail.create_at', '=', 'order.O_date')
        ->get(['order.*', 'User.surname']);

        return view ('Oder.admin.OrderList') -> with (['rs' => $rs]);
    }

    
    

    //3. UPDATE
    public function updateOrder(){}
    public function updateOrderProcess(Request $rqst, $id){}

    //4. DELETE
    public function deleteOrder($id) {}
}
