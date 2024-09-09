<?php

use App\Http\Controllers\EditDashboard;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('dashboard/product', 'pages.product')
    ->middleware(['auth', 'verified'])
    ->name('dashboard.product');
Route::view('dashboard/kategori', 'pages.kategori')
    ->middleware(['auth', 'verified'])
    ->name('dashboard.kategori');
Route::view('dashboard/pesanan', 'pages.pesanan')
    ->middleware(['auth', 'verified'])
    ->name('dashboard.pesanan');

require __DIR__.'/auth.php';
