<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/courses', [App\Http\Controllers\HomeController::class, 'courses'])->name('courses');
Route::get('/trainers', [App\Http\Controllers\HomeController::class, 'trainers'])->name('trainers');
Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('content/{category_id}', [App\Http\Controllers\HomeController::class, 'content'])->name('content');
Route::get('take/test/{test_id}', [App\Http\Controllers\HomeController::class, 'take_test'])->name('test.take');
Route::post('test/submit', [App\Http\Controllers\HomeController::class, 'submit_test'])->name('test.submit');
Route::get('test/result', [App\Http\Controllers\HomeController::class, 'result_test'])->name('test.result');





Route::get('/subject-details', [App\Http\Controllers\HomeController::class, 'subjectDetails'])->name('subjectDetails');

Route::get('/quiz', [App\Http\Controllers\HomeController::class, 'Quiz'])->name('Quiz');


