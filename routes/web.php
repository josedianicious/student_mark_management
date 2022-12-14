<?php

use App\Http\Controllers\StudentMarkController;
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

Route::get('/','StudentController@index');
Route::resource('student', StudentController::class);
Route::resource('student-mark',StudentMarkController::class);
