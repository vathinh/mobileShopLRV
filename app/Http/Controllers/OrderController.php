<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\orderDetail;
USE App\Models\product;
USE App\Models\order;

class OrderController extends Controller
{
    //1. READ
    public function showOrders(){
        $rs = order::all();
        return view ('Oder.admin.OrderList') -> with (['rs' => $rs]);
    }

    

    //3. UPDATE
    public function updateOrder(){}
    public function updateOrderProcess(Request $rqst, $id){}

    //4. DELETE
    public function deleteOrder($id) {}
}
