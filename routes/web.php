<?php

use App\Http\Controllers\DelayController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartureController;

use App\Models\Delay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login')->middleware('auth');
Route::view('/home', 'homepage')->name('home')->middleware('auth');
Route::view('/register', 'register')->middleware('auth');
Route::view('/excel', 'uploadExcel');


Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

Route::resource('delays', DelayController::class);
Route::resource('students', StudentController::class);
Route::resource('departures', DepartureController::class);

Route::post('/file/student_spreadsheet', [StudentController::class, 'upload'])->name("file.upload.studentSpreadsheet");
