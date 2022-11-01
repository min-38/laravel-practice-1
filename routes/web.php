<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Study\StudyController;
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

/* Study */
// study board list
Route::get('/study/list', [StudyController::class, 'list'])->name('studyList');

// study board write
Route::get('/study/write', function (Request $req) {
    // You don't have permission to write
    if(!$req->session()->get('login') || $req->session()->get('rank') > 1) { // rank 0, 1
        // 글 작성 권한 없음
        return redirect()->back()->withErrors('You don\'t have permission to write');
    }
    return view('contents.study.write');
});

// study board write
Route::post('/study/upload', [StudyController::class, 'write'])->name('studyWrite');

// study board view
Route::get('/study/view/{id}', [StudyController::class, 'view'])->name('studyView');