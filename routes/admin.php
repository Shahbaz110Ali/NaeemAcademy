<?php

use Illuminate\Support\Facades\Route;


Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin');
    /** Test Routes */
    Route::get('interface', [App\Http\Controllers\Admin\TestController::class, 'interface'])->name('admin.interface');
    Route::get('interface/add', [App\Http\Controllers\Admin\TestController::class, 'interface_add'])->name('admin.interface.add');
    Route::post('interface/store', [\App\Http\Controllers\Admin\TestController::class, 'interface_store'])->name('admin.interface.store');
    Route::post('interface/save', [\App\Http\Controllers\Admin\TestController::class, 'interface_save'])->name('admin.interface.save');
    Route::get('interface/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'interface_edit'])->name('admin.interface.edit');

    Route::get('category/{id}', [App\Http\Controllers\Admin\TestController::class, 'category'])->name('admin.category');
    Route::get('category/add/{parent_id}', [App\Http\Controllers\Admin\TestController::class, 'category_add'])->name('admin.category.add');
    Route::post('category/store', [\App\Http\Controllers\Admin\TestController::class, 'category_store'])->name('admin.category.store');
    Route::post('category/save', [\App\Http\Controllers\Admin\TestController::class, 'category_save'])->name('admin.category.save');
    Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'category_edit'])->name('admin.category.edit');
    Route::get('category/delete/{id}', [\App\Http\Controllers\Admin\TestController::class, 'category_delete'])->name('admin.category.delete');
    
    Route::get('test/add/{category_id}', [App\Http\Controllers\Admin\TestController::class, 'test_add'])->name('admin.test.add');
    Route::post('test/store', [\App\Http\Controllers\Admin\TestController::class, 'test_store'])->name('admin.test.store');
    Route::get('test/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'test_edit'])->name('admin.test.edit');
    Route::post('test/save', [\App\Http\Controllers\Admin\TestController::class, 'test_save'])->name('admin.test.save');
    Route::get('test/delete/{id}', [\App\Http\Controllers\Admin\TestController::class, 'test_delete'])->name('admin.test.delete');

    Route::get('question/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'question'])->name('admin.question');
    Route::get('question/add/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'question_add'])->name('admin.question.add');
    Route::post('question/store', [\App\Http\Controllers\Admin\TestController::class, 'question_store'])->name('admin.question.store');
    Route::get('question/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'question_edit'])->name('admin.question.edit');
    Route::post('question/save', [\App\Http\Controllers\Admin\TestController::class, 'question_save'])->name('admin.question.save');
    Route::get('question/delete/{id}', [\App\Http\Controllers\Admin\TestController::class, 'question_delete'])->name('admin.question.delete');
    /** /. Test Routes */

    Route::get('competitions', [\App\Http\Controllers\Admin\AdminController::class, 'competitions'])->name('admin.competitions');
    Route::get('competition/participate/{test_id}', [\App\Http\Controllers\Admin\AdminController::class, 'competition_participants'])->name('admin.competition.participants');
    Route::get('competition/review/{test_id}/{user_id}', [\App\Http\Controllers\Admin\AdminController::class, 'competition_review'])->name('admin.competition.review');
    
    Route::get("settings/home/interface",[\App\Http\Controllers\Admin\SettingController::class, 'home_interface'])->name("settings.home.interface");
    Route::get("settings/home/category",[\App\Http\Controllers\Admin\SettingController::class, 'home_category'])->name("settings.home.category");
});
