<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginCustomerController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/payment', function() {
    return view('chechout.payment');
} );

Route::get('/payment', function() {
    return view('checkout.payment');
} );

//Admin Routes Goes Here:
Route::post('/login/admin' , LoginAdminController::class)->name('loginAdmin.attempt');
Route::post('/admin/users' , LoginAdminController::class)->name('admin.users');
Route::get('/admin/orders' , function() {
    return view('admin.orders');
});

Route::get('/login/admin/forgetpass', function() {
    return view('registration.forgetAdmin');
});

Route::get('/login/admin', function() { 
    return view('registration.loginAdmin');
});

Route::get('/admin',[DashboardController::class,'index']);

Route::get('/admin' , function() {
    return view('admin.dashboard');

});

Route::get('/admin/users' , function() {
    return view('admin.users');

});

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('auth')
    ->can('isAdmin');


Route::get('/admin/settings' , function() {
    return view('admin.settings');

});

Route::get('/admin/reports' , function() {
    return view('admin.reports');

});