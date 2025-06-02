<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Customer\CheckoutController as CustomerCheckoutController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\ReviewController as CustomerReviewController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route for nav-links
Route::get('about', function () {
    return view('about'); })->name('about');

// Route::get('/products', function () {
//     return view('products.index'); })->name('products');

Route::get('/contact', function () {
    return view('contact'); })->name('contact');

Route::get('/faq', function () {
    return view('faq'); })->name('faq');

Route::get('/privacy', function () {
    return view('privacy'); })->name('privacy');

Route::get('/products/stuffed-toys', [CustomerProductController::class, 'toys'])->name('products.toys');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('reports/users', [ReportController::class, 'users'])->name('reports.users');
    Route::get('reports/products', [ReportController::class, 'products'])->name('reports.products');
    Route::resource('discounts', \App\Http\Controllers\Admin\DiscountController::class);
});

// Customer product & category browsing
Route::get('/products', function(Request $request) {
    if (auth()->check()) {
        return app(\App\Http\Controllers\Customer\ProductController::class)->index($request);
    } else {
        return app(\App\Http\Controllers\Customer\ProductController::class)->indexGuest($request);
    }
})->name('products.index');

// Show product details
Route::get('/products/{product}', [CustomerProductController::class, 'show'])->name('products.show');
Route::get('/categories', [CustomerCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CustomerCategoryController::class, 'show'])->name('categories.show');

// Cart & checkout
Route::get('/cart', [CustomerCartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CustomerCartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CustomerCartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CustomerCartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CustomerCheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CustomerCheckoutController::class, 'process'])->name('checkout.process');

// Orders
Route::get('/orders/{order}/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation')->middleware('auth');
Route::get('/orders/{order}/track', [OrderController::class, 'track'])->name('orders.track')->middleware('auth');
Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history')->middleware('auth');

// Reviews
Route::post('/products/{product}/reviews', [CustomerReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

require __DIR__.'/auth.php';
