<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [NewsController::class, 'index']);
Route::get('/category/{id}', [NewsController::class, 'category'])->name('category.action');
Route::get('/search', [NewsController::class, 'search'])->name('search');
Route::get('/newsDetail/{id}', [NewsController::class, 'detail'])->name('detail.action');
Route::get('/problems/{id}', [NewsController::class ,'problemPage'])->name('problemRedirect');
Route::get('/news', [NewsController::class, 'news']);
