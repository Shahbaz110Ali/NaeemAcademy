<?php

use Illuminate\Support\Facades\Route;


Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'authenticate'])->name('admin.login');
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function() {
    Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
});