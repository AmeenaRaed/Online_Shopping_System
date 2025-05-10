<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginCustomerController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ProfileController;

//get(routepath, handler function)

Route::get('/', [homeController::class,'index']);

Route::post('logout', function(){
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');

})->name('logout');

// Route::get('/cart', function() {
//     return view('cart');
// });

Route::get('/wishlist', function() {
    return view('wishlist');
});


Route::prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{productId}', [CartController::class, 'update'])->name('cart.update'); // Ensure the correct method and productId parameter
    Route::delete('/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
});



Route::get('/login/admin', function() { 
    return view('registration.loginAdmin');
});

Route::post('/login/admin' , LoginAdminController::class)->name('loginAdmin.attempt');

Route::get('/login', function() {
    return view('registration.index');
});

Route::post('/login/customer', LoginCustomerController::class)->name('loginCustomer.attempt');


Route::get('/login/customer', function() {
    return view('registration.loginCustomer');
});

Route::get('/login/customer/forgetpass', function() {
    return view('registration.forgetCustomer');
});

Route::get('/login/admin/forgetpass', function() {
    return view('registration.forgetAdmin');
});

Route::get('/register', function(){
    return view('registration.register');
});

Route::post('/register' , RegisterController::class) -> name('register.store');

Route::get('/aboutus', function() {
    return view('home.aboutus');
});

Route::get('/brands', function() {
    return view('home.brands');
});

Route::get('/profile', function() {
    return view('profile.dashboard');
});

Route::get('/profile', function() {
    return view('profile.dashboard');
});

//TO ADD: Dynamic route for the orders

Route::get('/profile/orderhistory', function() {
    return view('profile.orderhistory');
});

//Dynamic route for categories
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


Route::get('/admin' , function() {
    return view('admin.dashboard');

});

Route::get('/admin/users' , function() {
    return view('admin.users');

});

//TO ADD: Dynamic route for managing users
Route::get('/admin/orders' , function() {
    return view('admin.orders');
});

// payment Page
Route::get('/payment', function () {
    return view('payment.payment');
})->name('payment');

// Shipment Details Page
Route::get('/shipment', function () {
    return view('payment.shipment');
})->name('shipment.page');

Route::get('/payment', [CartController::class, 'payment'])->name('payment');
Route::post('/payment/process', [CartController::class, 'processPayment'])->name('payment.process');
Route::post('/shipment/process', [ShipmentController::class, 'processShipment'])->name('shipment.process');
Route::get('/shipment/confirmation', [ShipmentController::class, 'confirmation'])->name('shipment.confirmation');

Route::get('/profile', [ProfileController::class, 'showOrder'])->name('profile.show')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'summary'])->name('profile.summary');





