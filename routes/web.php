<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'login')->name('login')->middleware('auth');
Route::view('/home', 'homepage')->name('home')->middleware('auth');
Route::view('/register', 'register')->middleware('auth');
Route::view('/excel', 'uploadExcel');

Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

Route::post('/file/student_spreadsheet', [StudentController::class, 'upload'])->name("file.upload.studentSpreadsheet");