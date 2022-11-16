<?php

use App\Http\Controllers\CategoryController;
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
    Route::post("/user/userDetailsUpdate/{id}",[HomeController::class, 'userDetailsUpdate']) ->name("userDetailsUpdate");

    // User change Password
    Route::get("user/change-password", [HomeController::class, 'changePassword'])->name('change-password');
    Route::post("user/change-password", [HomeController::class, 'updatePassword'])->name('update-password');

    // Add + Remove + Update + View Cart
    Route::get('cart', [OrderController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [OrderController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [OrderController::class, 'remove'])->name('remove.from.cart');
    
    // Checkout from cart + Create order
    Route::get('/checkout/{id}',[OrderController::class, 'checkout']); 

    // Create orderDetails
    Route::post("/user/createOrderProc/{O_id}",[OrderController::class, 'createOrderProc']) ->name("createOrderProc");

    // View order
    Route::post("/user/createOrderProc/{O_id}",[OrderController::class, 'createOrderProc']) ->name("createOrderProc");
    Route::get("/user/vieworder/{id}",[OrderController::class, 'vieworderuser']) ->name("vieworderuser");
    //feedback
    Route::resource("/user/product/feedback", FeedBackController::class);


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
    Route::get("/admin/user/viewMore/{id}",[HomeController::class, 'viewMore']) ->name("viewMore");
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
    // ProductDetails
    Route::get("/admin/product/a_productDetails/{id}", [ProductController::class, 'admin_productDetails']) ->name("admin_productDetails");

    // Delete Product
    Route::get("/admin/product/deleteProduct/{id}", [ProductController::class, 'deleteProduct']) ->name("deleteProduct");

    // Feedback
    Route::resource("/admin/product/feedback", FeedBackController::class);
    Route::resource("/admin/product/feedback/create", FeedBackController::class);
    // FEEDBACK MANAGEMENT

       // ORDER MANAGEMENT
       Route::get("/admin/order/list",[OrderController::class, 'showOrders']) ->name("showOrders");

       Route::get('/admin/order/acceptstatus/{O_id}',[OrderController::class,'acceptstatus'])->name('acceptstatus');
       Route::get('/admin/order/declinestatus/{O_id}',[OrderController::class,'declinestatus'])->name('declinestatus');

    // CATEGORY
    // Read Category
    Route::get("/admin/product/readCategory",[CategoryController::class, 'showCategory']) ->name("showCategory");

    // Create Product
    Route::get("/admin/product/createCategory", [CategoryController::class, 'createCategory']) ->name("createCategory");
    Route::post("/admin/product/createCategoryProcess", [CategoryController::class, 'createNewCategoryProcess']) ->name("createNewCategoryProcess");
    
    // Update Category
    Route::get("/admin/category/update/{id}", [CategoryController::class, 'updateCategory']) ->name("updateCategory");
    Route::post("/admin/category/updateProcess/{id}", [CategoryController::class, 'updateCategoryProcess']) ->name("updateCategoryProcess");
});





Route::get('/', [ProductController::class, 'index']);  

Route::get("/user/productDetails/{id}", [ProductController::class, 'ushowProducts']) ->name("ushowProducts");

Route::resource("/product/feedback", FeedBackController::class);