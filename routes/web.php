<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::view('login','login');

Route::post('loginuser',[AdminController::class,'auth'])
->name('auth');
//route navigation to sidebar
Route::view('admin/dashboard','admin.dashboard')->middleware('checkuser');
Route::get('admin/student',[AdminController::class,'student'])->middleware('checkuser');
Route::get('admin/settings',[AdminController::class,'settings'])->middleware('checkuser');
Route::get('admin/sms',[AdminController::class,'sms'])->middleware('checkuser');




Route::post('/store_year',[AdminController::class,'store_yearlevel'])->middleware('checkuser');
Route::post('/create_course',[AdminController::class,'create_course'])->middleware('checkuser');
//paginateyear
Route::get('/paginate_year',[AdminController::class,'yearpaginate'])->middleware('checkuser');
//getcourse
Route::get('/get_course',[AdminController::class,'get_course'])->middleware('checkuser');
Route::post('/change_year',[AdminController::class,'edit_year'])->middleware('checkuser');
Route::post('/change_course',[AdminController::class,'edit_course'])->middleware('checkuser');
Route::get('/delete_course/{id}',[AdminController::class,'delete_course'])->middleware('checkuser');

Route::get('/check_year_course_connection/{id}',[AdminController::class,'check_connection_year_course'])->middleware('checkuser');
Route::get('/get_course_key/{id}',[AdminController::class,'get_course_key'])->middleware('checkuser');
Route::post('/save_student',[AdminController::class,'save_student'])->middleware('checkuser')->name('save_new_student');
Route::get('/edit_student/{id}',[AdminController::class,'edit_student'])->middleware('checkuser');
Route::post('/save_edit_student',[AdminController::class,'save_edit_student'])->middleware('checkuser')->name('save_edit_student');
Route::post('/delete_student',[AdminController::class,'delete_student'])->middleware('checkuser');

