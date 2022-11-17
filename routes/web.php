<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Board\StudyController;
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

/* 로그인/로그아웃/회원가입 */

Route::get('/login', function() {
    return view('contents.auth.login');
})->name('login'); // login
Route::post('/loginProcess', [AuthController::class, 'login_process'])->name('loginProcess'); // send login form
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // logout
Route::get('/register', function() {
    return view('contents.auth.register');
})->name('register'); // register
Route::post('/register/process', [AuthController::class, 'register_process'])->name('registerProcess'); // send register form

/* Study */
// study board list
Route::get('/study', [StudyController::class, 'index'])->name('studyList'); // study listing
<<<<<<< HEAD
Route::post('/study', [StudyController::class, 'store'])->name('studyUpload'); // study board store
Route::get('/study/write/{id?}', [StudyController::class, 'write'])->name('studyWrite'); // study board write
Route::get('/study/{id}', [StudyController::class, 'view'])->name('studyView'); // study board view
Route::put('/study/{id}', [StudyController::class, 'update'])->name('studyUpdate'); // study board update

/* Download */
Route::get('/downFile/{fileName}', [DownloadController::class, 'download'])->name('downFile'); // study board update
=======
Route::get('/study/write/{id?}', [StudyController::class, 'write'])->name('studyWrite'); // study board write
Route::get('/study/{id}', [StudyController::class, 'view'])->name('studyView'); // study board view

Route::post('/study', [StudyController::class, 'store'])->name('studyUpload'); // study board store
Route::put('/study/{id}', [StudyController::class, 'update'])->name('studyUpdate'); // study board update
>>>>>>> main
