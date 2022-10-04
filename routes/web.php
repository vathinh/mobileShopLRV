<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//------------------ADMIN - CRUD -PRODUCT ----------------
//READ
Route::get('admin/xemsp','Product@Controller@showProducts');

//CREATE
Route::get('admin/themsp','Product@Controller@createNewProduct');
Route::post('admin/xulythemsp','Product@Controller@createNewProductProcess');

//UPDATE
Route::get('admin/suasp/{id}','Product@Controller@updateProduct');
Route::post('admin/xulysuasp/{id}','Product@Controller@updateProductProcess');

//DELETE
Route::get('admin/xoasp/{id}','ItemController@delete');

//------------------END ADMIN - CRUD -PRODUCT ----------------




//------------------ADMIN - CUD -ORDER ----------------
//READ
Route::get('admin/xemdh','Product@Controller@showOrders');


//UPDATE
Route::get('admin/suadh/{id}','Product@Controller@updateOrder');
Route::post('admin/xulysuadh/{id}','Product@Controller@updateOrderProcess');

//DELETE
Route::get('admin/xoadh/{id}','ItemController@deleteOrder');

//------------------END ADMIN - CUD -ORDER ----------------