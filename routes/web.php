<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [ProductController::class, 'index']);  


Auth::routes();
// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{

    //UserDB
    Route::get("/user/userDB",[HomeController::class, 'userDB'])->name("userDB");
    // Userhome
    Route::get("/user/home",[HomeController::class, 'userHome'])->name("newWelcome");
    // View + ChangeInfo
    Route::get("/user/userDetails/{id}",[HomeController::class,'userDetails'])->name("user.userDetails");
    Route::post("/user/userDetailsUpdate/{id}",[HomeController::class, 'userDeilsUpdate']) ->name("userDeilsUpdate");

    // User change Password
    Route::get("user/change-password", [HomeController::class, 'changePassword'])->name('change-password');
    Route::post("user/change-password", [HomeController::class, 'updatePassword'])->name('update-password');

    // Add + Remove + Update + View Cart
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
    
    // Checkout from cart + Create order
    Route::get('/checkout/{id}',[ProductController::class, 'checkout']); 

    // Create orderDetails
    Route::post("/user/createOrderProc/{O_id}",[ProductController::class, 'createOrderProc']) ->name("createOrderProc");
    Route::get("/user/vieworder/{O_id}",[OrderController::class, 'vieworder']) ->name("vieworder");



});
// Route Editor
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});

// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("adminDB.adminDB");
    // USER MANAGEMENT
    // Read user
    Route::get("/admin/user/readUser",[HomeController::class, 'readUser']) ->name("readUser");

    // Create user
    Route::get("/admin/user/createUser",[HomeController::class, 'createUser']) ->name("createUser");
    Route::post("/admin/user/createUserProc",[HomeController::class, 'createUserProc']) ->name("createUserProc");

    // Update user
    Route::get("/admin/user/updateUser/{id}",[HomeController::class, 'updateUser']) ->name("updateUser");
    Route::post("/admin/user/updateUserProc/{id}",[HomeController::class, 'updateUserProc']) ->name("updateUserProc");

    // Delete user
    Route::get("/admin/user/deleteUser/{id}",[HomeController::class, 'deleteUser']) ->name("deleteUser");

    // Reset User Password
    Route::get("/admin/user/resetPwd/{id}",[HomeController::class, 'resetPwd']) ->name("resetPwd");



    // PRODUCT MANAGEMENT
    // Read product
    Route::get("/admin/product/readproduct",[ProductController::class, 'showProducts']) ->name("showProducts");

    // Create Product
    Route::get("/admin/product/createproduct", [ProductController::class, 'createNewProduct']) ->name("createNewProduct");
    Route::post("/admin/product/createproductProcess", [ProductController::class, 'createNewProductProcess']) ->name("createNewProductProcess");

    // Update Product
    Route::get("/admin/product/updateProduct/{id}", [ProductController::class, 'updateProduct']) ->name("updateProduct");
    Route::post("/admin/product/updateProductProcess/{id}", [ProductController::class, 'updateProductProcess']) ->name("updateProductProcess");

    // Delete Product
    Route::get("/admin/product/deleteProduct/{id}", [ProductController::class, 'deleteProduct']) ->name("deleteProduct");

    // Feedback
    Route::resource("/admin/product/feedback", FeedBackController::class);
    // FEEDBACK MANAGEMENT

    // ORDER MANAGEMENT
    Route::get("/admin/order/list",[OrderController::class, 'showOrders']) ->name("showOrders");
});





Route::get('/', [ProductController::class, 'index']);  

Route::get("/user/productDetails/{id}", [ProductController::class, 'ushowProducts']) ->name("ushowProducts");

 

