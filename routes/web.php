<?php

/*use Illuminate\Support\Facades\Auth;*/

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index'])->name('main.index');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'books'], function (){
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/', [BookController::class, 'store'])->name('book.store');
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
        Route::patch('/{book}', [BookController::class, 'update'])->name('book.update');
        Route::delete('/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    });
    Route::group(['prefix' => 'authors'], function (){
        Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('/', [AuthorController::class, 'store'])->name('author.store');
        Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
        Route::patch('/{author}', [AuthorController::class, 'update'])->name('author.update');
        Route::delete('/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
    });

});

Auth::routes();
