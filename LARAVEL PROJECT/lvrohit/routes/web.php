<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;//step 1 dashboard route without usercontroller 
use App\Http\Controllers\UserController;//step 2 dashboard route with usercontroller 
use App\Http\Controllers\AdminController;//admin route for admin dashboard and admin functionalities


Route::get('/', [UserController::class, 'home'])->name('index'); // index page route
Route::get('/shop',[UserController::class, 'shop'])->name('shop');//shop page route
Route::get('/contact',[UserController::class, 'contact'])->name('contact');//contact page route
Route::get('/viewcategory/{cat_name}', [UserController::class, 'viewcategory'])->name('viewcategory');// catagories name to open that catagories products route
Route::get('/productsdetails/{id}', [UserController::class, 'productsdetails'])->name('productsdetails');//productsdetails page route
Route::get('/add_to_wishlist/{id}',[UserController::class, 'addtowishlist']) ->middleware(['auth', 'verified'])->name('addtowishlist');//add to wishlist route
Route::get('/wishlist',[UserController::class, 'wishlist']) ->middleware(['auth', 'verified'])->name('wishlist');//wishlist page route
Route::get('/removewish/{id}', [UserController::class, 'removewish'])->name('removewish');

//cart routes...\\
Route::get('/add_to_cart/{id}',[UserController::class, 'addtocart']) ->middleware(['auth', 'verified'])->name('addtocart');//add to cart route
Route::get('/cartlist',[UserController::class, 'cartlist']) ->middleware(['auth', 'verified'])->name('cartlist');//cartlist page route
//Route::get('/Wish_list',[UserController::class, 'wishlist']) ->middleware(['auth', 'verified'])->name('wishlist');//wishlist page route
Route::delete('/cart/{id}', [UserController::class, 'deleteCartpro']) ->name('cart.remove');//remove product from cart route

Route::post('/search',[UserController::class, 'searchproduct'])->name('search');//search product route

//order routes...\\
Route::post('/checkout',[UserController::class,'checkout'] )->middleware(['auth', 'verified'])->name('checkout');//checkout route 
Route::post('/place-order',[UserController::class,'placeOrder'] )->middleware(['auth', 'verified'])->name('place.order');//place order route
Route::post('/payu/success', [UserController::class, 'payuSuccess'])->middleware(['auth', 'verified'])->name('payu.success');//payment success route
Route::post('/payu/fail', [UserController::class, 'payuFail'])->middleware(['auth', 'verified'])->name('payu.fail'); //paymanet fail route
Route::get('/my-orders',[UserController::class,'myOrders'])->middleware(['auth','verified'])->name('orders.my');//my orders page route
Route::get('/invoice/{orderId}', [UserController::class, 'invoice'])->middleware(['auth', 'verified'])->name('order.invoice');
Route::post('/remove-order/{order_id}',[UserController::class, 'removeOrder'])->middleware('auth')->name('orders.remove');




/*Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard'); 
*/ //step 1 dashboard route without usercontroller

Route::get('/dashboard',[UserController::class, 'index']) ->middleware(['auth', 'verified'])->name('dashboard');//step 2 dashboard route with usercontroller

    // route middleware auth group function
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route middleware admin group function for admin dashboard and admin functionalities
Route::middleware('admin')->group(function () {

    Route::get('/add_catagories',[AdminController::class, 'addcatagories'])->name('admin.addcatagories');//add catagories page route
    Route::get('/view_catagories',[AdminController::class, 'viewcatagories'])->name('admin.viewcatagories');//view catagories page route
    Route::get('/add_product',[AdminController::class, 'addproduct'])->name('admin.addproduct');//add product page route
    Route::get('/view_product',[AdminController::class, 'viewproduct'])->name('admin.viewproduct');//view product page route
    Route::post('/add_catagories',[AdminController::class, 'postAddcatagories'])->name('admin.postaddcatagories');//add catagories form submit route
    Route::get('/delete_catagories/{id}',[AdminController::class, 'deletecatagories'])->name('admin.deletecatagories');//delete catagories route
    Route::get('/update_catagories/{id}',[AdminController::class, 'updatecatagories'])->name('admin.updatecatagories');//update catagories page route
    Route::post('/update_catagories/{id}',[AdminController::class, 'posteditcatagories'])->name('admin.posteditcatagories');//update catagories form submit route
    Route::post('/postadd_product',[AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');//add product form submit route
    Route::get('/update_product/{id}',[AdminController::class, 'updateproduct'])->name('admin.updateproduct');//update product page route
    Route::post('/update_product/{id}',[AdminController::class, 'posteditproduct'])->name('admin.posteditproduct');//update product form submit route
    Route::get('/delete_product/{id}',[AdminController::class, 'deleteproduct'])->name('admin.deleteproduct');//delete product route
    Route::post('/search_product',[AdminController::class, 'postsearchproduct'])->name('admin.postsearchproduct');//search product form submit route
    Route::get('/allorder',[AdminController::class, 'allorder'])->name('admin.allorders');//view orders form submit route
    Route::post('/order_status/{order_id}',[AdminController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    
    });

require __DIR__.'/auth.php';
