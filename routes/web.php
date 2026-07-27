<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NvtHomeController;

// Trang chủ & Sản phẩm
Route::get('/', [NvtHomeController::class, 'index'])->name('home');
Route::get('/san-pham', [NvtHomeController::class, 'products'])->name('products');
Route::get('/chi-tiet-san-pham/{id?}', [NvtHomeController::class, 'detail'])->name('product.detail');

// Trang Quản trị Admin
Route::get('/admin/products', [NvtHomeController::class, 'adminProducts'])->name('admin.products');

// Route Trang Giỏ hàng (Đã đổi tên route thành nvt.cart để đồng bộ với Blade)
Route::get('/cart', [NvtHomeController::class, 'cart'])->name('nvt.cart');

// Route Trang Thanh toán
Route::get('/checkout', [NvtHomeController::class, 'checkout'])->name('nvt.checkout');
Route::post('/checkout/process', [NvtHomeController::class, 'process'])->name('nvt.checkout.process');