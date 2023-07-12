<?php

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

Route::get('/', [App\Http\Controllers\BooksController::class,'index']);
// Route::get('/book', [App\Http\Controllers\BookController::class,'index']);
Route::get('/kniga/{bookId}', [App\Http\Controllers\BooksController::class,'show'])->name('kniga.prikazi');

Route::get('/users', [App\Http\Controllers\UserController::class,'index']);

Route::get('/author', [App\Http\Controllers\AuthorsController::class,'index']);
Route::get('/avtor/{authorId}', [App\Http\Controllers\AuthorsController::class,'show'])->name('avtor.prikazi');
