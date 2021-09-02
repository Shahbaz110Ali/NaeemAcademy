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
    
    Route::get('test/add/{category_id}', [App\Http\Controllers\Admin\TestController::class, 'test_add'])->name('admin.test.add');
    Route::post('test/store', [\App\Http\Controllers\Admin\TestController::class, 'test_store'])->name('admin.test.store');
    Route::get('test/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'test_edit'])->name('admin.test.edit');
    Route::post('test/save', [\App\Http\Controllers\Admin\TestController::class, 'test_save'])->name('admin.test.save');

    Route::get('question/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'question'])->name('admin.question');
    Route::get('question/add/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'question_add'])->name('admin.question.add');
    Route::post('question/store', [\App\Http\Controllers\Admin\TestController::class, 'question_store'])->name('admin.question.store');
    Route::get('question/edit/{id}', [\App\Http\Controllers\Admin\TestController::class, 'question_edit'])->name('admin.question.edit');
    Route::post('question/save', [\App\Http\Controllers\Admin\TestController::class, 'question_save'])->name('admin.question.save');
    /** /. Test Routes */

    /** Subject Routes */
    Route::get('subjects', [App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('admin.subjects');
    Route::get('subjects/add', [App\Http\Controllers\Admin\SubjectController::class, 'add'])->name('admin.subjects.add');
    Route::post('subjects/store', [\App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('admin.subjects.store');
    Route::get('subjects/edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('admin.subjects.edit');
    Route::post('subjects/update', [\App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('admin.subjects.update');
    Route::get('subjects/toggle_status/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'toggle_status'])->name('admin.subjects.toggle_status');
    Route::get('subjects/destroy/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'destroy'])->name('admin.subjects.destroy');

    /** /. Subject Routes */

    /** Department Routes */
    Route::get('departments', [App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('admin.departments');
    Route::get('departments/add', [App\Http\Controllers\Admin\DepartmentController::class, 'add'])->name('admin.departments.add');
    Route::post('departments/store', [\App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('admin.departments.store');
    Route::get('departments/edit/{id}', [\App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('admin.departments.edit');
    Route::post('departments/update', [\App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('admin.departments.update');
    Route::get('departments/toggle_status/{id}', [\App\Http\Controllers\Admin\DepartmentController::class, 'toggle_status'])->name('admin.departments.toggle_status');
    Route::get('departments/destroy/{id}', [\App\Http\Controllers\Admin\DepartmentController::class, 'destroy'])->name('admin.departments.destroy');

    /** /. Department Routes */

    /** Jst Pst Routes */
    // Route::get('jstPst',[App\Http\Controllers\Admin\JstPstController::class, 'index'])->name('admin.jstPst');
    // Route::get('jstPst/add',[App\Http\Controllers\Admin\JstPstController::class, 'add'])->name('admin.jstPst.add');
    // Route::post('jstPst/store', [\App\Http\Controllers\Admin\JstPstController::class, 'store'])->name('admin.jstPst.store');
    // Route::get('jstPst/edit/{id}', [\App\Http\Controllers\Admin\JstPstController::class, 'edit'])->name('admin.jstPst.edit');
    // Route::post('jstPst/update', [\App\Http\Controllers\Admin\JstPstController::class, 'update'])->name('admin.jstPst.update');
    // Route::get('jstPst/toggle_status/{id}', [\App\Http\Controllers\Admin\JstPstController::class, 'toggle_status'])->name('admin.jstPst.toggle_status');
    // Route::get('jstPst/destroy/{id}', [\App\Http\Controllers\Admin\JstPstController::class, 'destroy'])->name('admin.jstPst.destroy');

    /** /. Jst Pst Routes */

    /** Jst Pst Subjects Routes */
    Route::get('jst-pst/subjects', [App\Http\Controllers\Admin\JstPst\SubjectController::class, 'index'])->name('admin.jst-pst.subjects');
    Route::get('jst-pst/subjects/add', [App\Http\Controllers\Admin\JstPst\SubjectController::class, 'add'])->name('admin.jst-pst.subjects.add');
    Route::post('jst-pst/subjects/store', [\App\Http\Controllers\Admin\JstPst\SubjectController::class, 'store'])->name('admin.jst-pst.subjects.store');
    Route::get('jst-pst/subjects/destroy/{id}', [\App\Http\Controllers\Admin\JstPst\SubjectController::class, 'destroy'])->name('admin.jst-pst.subjects.destroy');
    /** /. Jst Pst Subjects Routes */

    /** Jst Pst Topics Routes */
    Route::get('jst-pst/topics/{subjectAssignedId}', [\App\Http\Controllers\Admin\JstPst\TopicController::class, 'index'])->name('admin.jst-pst.topics');
    Route::post('jst-pst/topics/store', [\App\Http\Controllers\Admin\JstPst\TopicController::class, 'store'])->name('admin.jst-pst.topics.store');
    Route::post('jst-pst/topics/update', [\App\Http\Controllers\Admin\JstPst\TopicController::class, 'update'])->name('admin.jst-pst.topics.update');
    Route::get('jst-pst/topics/destroy/{id}', [\App\Http\Controllers\Admin\JstPst\TopicController::class, 'destroy'])->name('admin.jst-pst.topics.destroy');
    Route::get('jst-pst/topics/get/{subjectAssignedId}', [\App\Http\Controllers\Admin\JstPst\TopicController::class, 'get'])->name('admin.jst-pst.topics.get');
    
    /** /. Jst Pst Topics Routes */

    /** Jst Pst Tests Routes */
    Route::get('jst-pst/tests', [App\Http\Controllers\Admin\JstPst\TestController::class, 'index'])->name('admin.jst-pst.tests');
    Route::get('jst-pst/tests/add', [App\Http\Controllers\Admin\JstPst\TestController::class, 'add'])->name('admin.jst-pst.tests.add');
    /** /. Jst Pst Topics Routes */
});
