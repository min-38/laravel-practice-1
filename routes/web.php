<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [HomeController::class, 'index']);

// Auth
Route::get('/login', function() {
    return view('contents.auth.login');
});
Route::get('/signup', function() {
    return view('contents.auth.signup');
});
Route::post('/sign_up_process', [AuthController::class, 'sign_up_process'])->name('SignUpProcess');;