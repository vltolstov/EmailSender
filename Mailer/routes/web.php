<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
//use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AddressbookController;

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

Route::get('/', [IndexController::class, 'index'])
    ->middleware('auth')
    ->name('index');


Route::get('login', function (){return view('login');})->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
//Route::get('register', function (){return view('register');})->name('register');
//Route::post('register', [RegisterController::class, 'save']);



Route::resource('/addressbooks', AddressbookController::class);
//Route::post('/addressbooks', [AddressbookController::class. 'store'])->name('add-addressbook');
