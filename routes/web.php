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
use App\Http\Controllers\LoginSupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ForgotCustomerController;
use App\Http\Controllers\ForgotAdminController;
use App\Http\Controllers\ForgotSupplierController;


//get(routepath, handler function)

Route::get('/', [homeController::class, 'index']);

Route::post('logout', function () {
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



Route::get('/login/admin', function () {
    return view('registration.loginAdmin');
});

Route::post('/login/admin', LoginAdminController::class)->name('loginAdmin.attempt');

Route::get('/login/supplier', function () {
    return view('registration.loginSupplier');
});

Route::post('/login/supplier', LoginSupplierController::class)->name('loginSupplier.attempt');

Route::get('/login', function () {
    return view('registration.index');
});

Route::post('/login/customer', LoginCustomerController::class)->name('loginCustomer.attempt');


Route::get('/login/customer', function () {
    return view('registration.loginCustomer');
});

Route::get('/login/customer/forgetpass', function () {
    return view('registration.forgetCustomer');
});


Route::get('/login/supplier/forgetpass', function () {
    return view('registration.forgetSupplier');
});

Route::get('/register', function () {
    return view('registration.register');
});

Route::post('/register', RegisterController::class)->name('register.store');

Route::get('/aboutus', function () {
    return view('home.aboutus');
});

Route::get('/products', [ProductController::class, 'showAll']);

Route::get('/profile', function () {
    return view('profile.dashboard');
});

//Dynamic route for categories
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// //Admin Routes Goes Here:
// Route::post('/login/admin' , LoginAdminController::class)->name('loginAdmin.attempt');
// Route::post('/admin/users' , LoginAdminController::class)->name('admin.users');
// Route::get('/admin/orders' , function() {
//     return view('admin.orders');
// });

Route::get('/login/admin/forgetpass', function () {
    return view('registration.forgetAdmin');
});

Route::get('/login/admin', function () {
    return view('registration.loginAdmin');
});

Route::get('/admin', [DashboardController::class, 'index']);

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

Route::post('/admin/users/add', [UserController::class, 'store'])->name('admin.users.store');

Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');

Route::delete('/admin/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');

Route::put('/admin/users/edit/{user}', [UserController::class, 'update'])->name('admin.users.update');

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');


Route::put('/admin/orders/show/{id}', [OrderController::class, 'show'])->name('admin.orders.show');

Route::put('/admin/orders/edit/{order}', [OrderController::class, 'update'])->name('admin.orders.update');

Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
Route::put('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');

Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');

Route::prefix('/supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/reports', [SupplierController::class, 'reports'])->name('supplier.reports');
    Route::post('/add', [SupplierController::class, 'add'])->name('supplier.add');
    Route::put('/edit/{productid}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::delete('/delete/{productid}', [SupplierController::class, 'delete'])->name('supplier.delete');
});

// Shipment Details Page
Route::get('/shipment', function () {
    return view('payment.shipment');
})->name('shipment.page');

Route::get('/payment/{orderId}', [PaymentController::class, 'showForm'])->name('payment.form.withId');
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


// //forget password
Route::get('/login/admin/forgetpass', function () {
    return view('registration.forgetAdmin');
})->name('admin.forgot-password');

Route::get('/login/admin', function () {
    return view('registration.loginAdmin');
})->name('loginAdmin.show');


Route::get('/login/supplier/forgetpass', function () {
    return view('registration.Supplier');
})->name('supplier.forgot-password');

Route::get('/login/supplier', function () {
    return view('registration.loginSupplier');
})->name('loginSupplier.show');


 Route::get('/login/customer', function () {
    return view('registration.loginCustomer');
})->name('loginCustomer.show');


Route::get('/login/customer/forgetpass', function () {
    return view('registration.forgetCustomer');
})->name('customer.forgot-password');

Route::post('/reset-password/admin', [ForgotAdminController::class, 'reset'])->name('admin.reset-password');

Route::post('/reset-password/supplier', [ForgotSupplierController::class, 'reset'])->name('supplier.reset-password');

Route::post('/reset-password/customer', [ForgotCustomerController::class, 'reset'])->name('customer.reset-password');
