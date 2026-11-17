<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::get('/create-book', [BookController::class, 'create']);
Route::post('/store-book', [BookController::class, 'store'])->name('store-book');
Route::delete('/destroy-book/{book}', [BookController::class, 'destroy'])->name('destroy-book');
Route::get('/edit-book/{book}', [BookController::class, 'edit'])->name('edit-book');
Route::put('/edit-book/{book}', [BookController::class, 'update'])->name('update-book');
