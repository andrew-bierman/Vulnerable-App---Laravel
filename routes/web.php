<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\XSSController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'doLogin']);
Route::get('/profile/{id}', [UserController::class, 'showProfile']);

Route::get('/secret/{id}', [UserController::class, 'secretData']);

Route::get('/xss', [XSSController::class, 'index'])->name('xss.index');
Route::post('/xss', [XSSController::class, 'store'])->name('xss.store');
