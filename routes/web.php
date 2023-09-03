<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;


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

Route::get('/', function(){
    return view('welcome');

})->name('public');

Route::get('/knigi', [App\Http\Controllers\BooksController::class,'index'])->name('allBooks.show');
// Route::get('/book', [App\Http\Controllers\BookController::class,'index']);
Route::get('/kniga/{bookId}', [App\Http\Controllers\BooksController::class,'show'])->name('kniga.prikazi');
Route::post('/kniga/{knigaId}', [App\Http\Controllers\BooksController::class,'create'])->name('rentBook.create');



Route::get('/users', [App\Http\Controllers\UserController::class,'index'])->name('user.prikazi');
Route::get('/users/{userId}', [App\Http\Controllers\UserController::class,'show'])->name('korisnik.prikazi');
Route::post('/users/{userId}', [App\Http\Controllers\UserController::class,'create'])->name('rent.create');
Route::get('/updateRent/{rentId}', [App\Http\Controllers\UserController::class,'update'])->name('rent.update');



Route::get('/author', [App\Http\Controllers\AuthorsController::class,'index'])->name('allAuthors.show');
Route::get('/avtor/{authorId}', [App\Http\Controllers\AuthorsController::class,'show'])->name('avtor.prikazi');

// Route::get('/proba', function(){
//     return view('_layout.cork');

// });


Route::get('/dashboard', [App\Http\Controllers\CustomAuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('/login', [App\Http\Controllers\CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('/registration', [App\Http\Controllers\CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [App\Http\Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('/signout', [App\Http\Controllers\CustomAuthController::class, 'signOut'])->name('signout');



Route::get('/profile/2fa', [App\Http\Controllers\ProfileController::class, 'twofa'])->name('profile.twofa');
Route::post('/profile/2fa', [App\Http\Controllers\ProfileController::class, 'twofaEnable'])->name('profile.twofaEnable');


Route::get('/login/otp', 'App\Http\Controllers\OTPController@show')->name('otp.show');
Route::post('/login/otp', 'App\Http\Controllers\OTPController@check');

Route::get('/rent', [App\Http\Controllers\RentController::class, 'index'])->name('rent');