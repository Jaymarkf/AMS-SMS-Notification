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

Route::view('admin/dashboard','admin.dashboard')->middleware('checkuser');

Route::get('admin/student',[AdminController::class,'student'])->middleware('checkuser');
Route::get('admin/settings',[AdminController::class,'settings'])->middleware('checkuser');
Route::post('/store_year',[AdminController::class,'store_yearlevel'])->middleware('checkuser');
Route::post('/create_course',[AdminController::class,'create_course'])->middleware('checkuser');
//paginateyear
Route::get('/paginate_year',[AdminController::class,'yearpaginate'])->middleware('checkuser');
//getcourse
Route::get('/get_course',[AdminController::class,'get_course'])->middleware('checkuser');


