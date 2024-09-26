<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/books', [HomeController::class, 'books'])->name('books');
// Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
// Route::get('/category/{id}', [HomeController::class, 'categoryBooks'])->name('category.books');

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/books', [HomeController::class, 'books'])->name('books');
    Route::get('/category/{id}', [HomeController::class, 'categoryBooks'])->name('category.books');
});

Route::prefix('books')->group(function () {
    Route::get('/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/store', [BookController::class, 'store'])->name('book.store');
    Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
    Route::get('/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/{id}', [BookController::class, 'update'])->name('book.update');
});
