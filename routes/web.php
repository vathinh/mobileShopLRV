<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

    // Userhome
    Route::get("/user/home",[HomeController::class, 'userHome'])->name("newWelcome");
    // View + ChangeInfo
    Route::get("/user/userDetails/{id}",[HomeController::class,'userDetails'])->name("user.userDetails");
    Route::post("/user/userDetailsUpdate/{id}",[HomeController::class, 'userDeilsUpdate']) ->name("userDeilsUpdate");

    Route::get("user/change-password", [HomeController::class, 'changePassword'])->name('change-password');
    Route::post("user/change-password", [HomeController::class, 'updatePassword'])->name('update-password');


    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
    Route::get('/checkout/{id}',[ProductController::class, 'checkout']); 

    Route::post("/user/createOrderProc",[ProductController::class, 'createOrderProc']) ->name("createOrderProc");




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

});

Route::get('/', [ProductController::class, 'index']);  

 

