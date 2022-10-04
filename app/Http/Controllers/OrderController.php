<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\order;

class OrderController extends Controller
{
    //1. READ
    public function showOrders(){}

    

    //3. UPDATE
    public function updateOrder(){}
    public function updateOrderProcess(Request $rqst, $id){}

    //4. DELETE
    public function deleteOrder($id) {}
}
