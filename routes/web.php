<?php

use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

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

//Frontpage
Route::get('/', [FrontpageController::class, 'index']);

Route::get('/register', [RegisterController::class, 'createuser'])->name('user.create');
Route::post('/register-2', [RegisterController::class, 'saveuser2'])->name('user.create2');

Route::get('/register-3', [RegisterController::class, 'createuser3'])->name('user.create3');
//Route::get('/register', [RegisterController::class, 'createuser'])->name('user.create');

Route::get('/register-email', [RegisterController::class, 'registeremail'])->name('emails.register');

Route::post('/register-4', [RegisterController::class, 'saveuser3'])->name('user.create4');
Route::get('/register-5', [RegisterController::class, 'createuser4'])->name('user.create5');
Route::get('/register-4', [RegisterController::class, 'resendcode'])->name('user.resendcode');
Route::get('/register-6', [RegisterController::class, 'createcustomizeaccount'])->middleware('cookiestage1')->name('user.user.create6');

//prepare your account
Route::post('/register-6', [RegisterController::class, 'savepreparation'])->name('user.saveprepare');

//plan
Route::get('/plan', [RegisterController::class, 'createplan'])->middleware('planstage2')->name('user.plan');

//Verify
Route::get('/verify', [RegisterController::class, 'createverifiedmessage'])->name('user.verified');


//Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
