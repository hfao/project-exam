<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExamController;
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('exam')->name('exam.')->group(function () {
        Route::get('index', [ExamController::class, 'index'])->name('index');
        Route::get('create', [ExamController::class, 'create'])->name('create');
        Route::post('store', [ExamController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ExamController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ExamController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [ExamController::class, 'destroy'])->name('destroy');
    });
});
