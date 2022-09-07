<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
//use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AddressbookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CardDavController;
use App\Http\Controllers\ContactStatusesController;
use App\Http\Controllers\MailingTemplateController;
use App\Http\Controllers\MailingListController;

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
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::get('/update-contacts', [CardDavController::class, 'updateContacts']);
Route::get('/blocked-contacts', [ContactStatusesController::class, 'index'])->name('blocked');

Route::get('/mailing-templates/{mailing_template}/copy', [MailingTemplateController::class, 'copy'])->name('copyTemplate');
Route::resource('/mailing-templates', MailingTemplateController::class);

Route::resource('/mailing-lists', MailingListController::class);
