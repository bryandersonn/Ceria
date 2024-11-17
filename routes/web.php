<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [NewsController::class, 'index']);
Route::get('/category/{id}', [NewsController::class, 'category'])->name('category.action');
Route::get('/search', [NewsController::class, 'search'])->name('search');
