<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


//get(routepath, handler function)

Route::get('/', function () {
    return view('home.welcome');
});

Route::get('/cart', function() {
    return view('cart');
});

Route::get('/wishlist', function() {
    return view('wishlist');
});

Route::get('/login', function() {
    return view('registration.login');
});

Route::get('/register', function() {
    return view('registration.register');
});

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
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

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

Route::get('/payment', function() {
    return view('chechout.payment');
} );

Route::get('/payment', function() {
    return view('checkout.payment');
} );
