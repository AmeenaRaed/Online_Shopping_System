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
use App\Http\Controllers\LoginSupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

//get(routepath, handler function)

Route::get('/', [homeController::class,'index']);

Route::post('logout', function(){
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');

})->name('logout');

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

Route::get('/login/supplier', function() { 
    return view('registration.loginSupplier');
});

Route::post('/login/supplier' , LoginSupplierController::class)->name('loginSupplier.attempt');

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

Route::get('/login/supplier/forgetpass', function() {
    return view('registration.forgetSupplier');
});

Route::get('/register', function(){
    return view('registration.register');
});

Route::post('/register' , RegisterController::class) -> name('register.store');

Route::get('/aboutus', function() {
    return view('home.aboutus');
});

Route::get('/products', [ProductController::class,'showAll']);

Route::get('/profile', function() {
    return view('profile.dashboard');
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

// // payment Page
// Route::get('/payment', function () {
//     return view('payment.payment');
// })->name('payment');

// Shipment Details Page
Route::get('/shipment', function () {
    return view('payment.shipment');
})->name('shipment.page');

Route::get('/payment', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/payment/receipt', [PaymentController::class, 'receipt'])->name('payment.receipt');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::post('/payment/cancel', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
Route::get('/payment/{orderId}', [PaymentController::class, 'showForm'])->name('payment.form');


Route::get('/shipment', [ShipmentController::class, 'show'])->name('shipment.show');
Route::post('/shipment/process', [ShipmentController::class, 'processShipment'])->name('shipment.process');
Route::get('/shipment/confirmation', [ShipmentController::class, 'confirmation'])->name('shipment.confirmation');

Route::get('/profile', [ProfileController::class, 'showOrder'])->name('profile.show')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'summary'])->name('profile.summary');





