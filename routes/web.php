<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NvtHomeController;
use App\Http\Controllers\TdDhAuthController;

// Trang chủ & Sản phẩm
Route::get('/', [NvtHomeController::class, 'index'])->name('home');
Route::get('/san-pham', [NvtHomeController::class, 'products'])->name('products');
Route::get('/chi-tiet-san-pham/{id?}', [NvtHomeController::class, 'detail'])->name('product.detail');

// Chăm sóc cây
Route::get('/care-guide', [NvtHomeController::class, 'careGuide'])->name('nvt.care.guide');

// Giới thiệu
Route::get('/about', [NvtHomeController::class, 'about'])->name('nvt.about');

// Trang Quản trị Admin
Route::get('/admin/products', [NvtHomeController::class, 'adminProducts'])->name('admin.products');
Route::post('/admin/products', [NvtHomeController::class, 'storeProduct'])->name('admin.products.store');
Route::put('/admin/products/{id}', [NvtHomeController::class, 'updateProduct'])->name('admin.products.update');
Route::delete('/admin/products/{id}', [NvtHomeController::class, 'destroyProduct'])->name('admin.products.destroy');

// Route Quản trị Danh mục (Categories)
Route::post('/admin/categories', [NvtHomeController::class, 'storeCategory'])->name('admin.categories.store');
Route::put('/admin/categories/{id}', [NvtHomeController::class, 'updateCategory'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [NvtHomeController::class, 'destroyCategory'])->name('admin.categories.destroy');

// Route Trang Giỏ hàng
Route::get('/cart', [NvtHomeController::class, 'cart'])->name('nvt.cart');
Route::post('/cart/add', [NvtHomeController::class, 'addToCart'])->name('nvt.cart.add');
Route::post('/cart/remove/{id}', [NvtHomeController::class, 'removeFromCart'])->name('nvt.cart.remove');

// Route Trang Thanh toán
Route::get('/checkout', [NvtHomeController::class, 'checkout'])->name('nvt.checkout');
Route::post('/checkout/process', [NvtHomeController::class, 'process'])->name('nvt.checkout.process');

// ======================================================================
// Auth Routes (Đăng nhập / Đăng ký)
// ======================================================================
Route::get('/login', [TdDhAuthController::class, 'showLoginForm'])->name('nvt.login');
Route::post('/login', [TdDhAuthController::class, 'login'])->name('nvt.login.submit');
Route::get('/register', [TdDhAuthController::class, 'showRegisterForm'])->name('nvt.register');
Route::post('/register', [TdDhAuthController::class, 'register'])->name('nvt.register.submit');
Route::post('/logout', [TdDhAuthController::class, 'logout'])->name('nvt.logout');