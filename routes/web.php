<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\VerificationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Main Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// login
Route::get('/login', function() {
    return view('contents.auth.login');
})->name('login');

// send login form
Route::post('/loginProcess', [AuthController::class, 'login_process'])->name('loginProcess');

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// register
Route::get('/register', function() {
    return view('contents.auth.register');
})->name('register');

// send register form
Route::post('/register/process', [AuthController::class, 'register_process'])->name('registerProcess');