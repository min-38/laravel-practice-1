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
Route::get('/login1', [AuthController::class, 'qqq'])->name('login');
// sign up
Route::get('/signup', function() {
    return view('contents.auth.signup');
})->name('signup');
// send sign up form
Route::post('/signup/process', [AuthController::class, 'signUp_process'])->name('SignUpProcess');