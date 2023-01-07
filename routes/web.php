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
Route::post('/register-2', [RegisterController::class, 'createuser2'])->name('user.create2');

Route::get('/register-3', [RegisterController::class, 'createuser3'])->name('user.create3');
//Route::get('/register', [RegisterController::class, 'createuser'])->name('user.create');

//Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
