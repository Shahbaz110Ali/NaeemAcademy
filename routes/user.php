<?php

use Illuminate\Support\Facades\Route;


Route::get('login', [App\Http\Controllers\User\LoginController::class, 'index'])->name('user.login');
Route::post('login', [App\Http\Controllers\User\LoginController::class, 'authenticate'])->name('user.authenticate');
Route::get('logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('user.logout');
Route::get('signin', [App\Http\Controllers\User\LoginController::class, 'redirect_to'])->name('user.signin');
Route::get('register', [App\Http\Controllers\User\LoginController::class, 'register'])->name('user.register');
Route::post('create', [App\Http\Controllers\User\LoginController::class, 'create'])->name('user.create');

Route::middleware('auth:web')->group(function () {
    Route::get('user', [App\Http\Controllers\User\UserController::class, 'dashboard'])->name('user');
    /** Test Routes */
    // Route::get('interface', [App\Http\Controllers\Admin\TestController::class, 'interface'])->name('admin.interface');
    // Route::get('interface/add', [App\Http\Controllers\Admin\TestController::class, 'interface_add'])->name('admin.interface.add');
    // Route::post('interface/store', [\App\Http\Controllers\Admin\TestController::class, 'interface_store'])->name('admin.interface.store');
    // Route::post('interface/save', [\App\Http\Controllers\Admin\TestController::class, 'interface_save'])->name('admin.interface.save');
    // Route::get('interface/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'interface_edit'])->name('admin.interface.edit');

    
});
