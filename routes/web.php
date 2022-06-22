<?php

use App\Http\Controllers\bookController;
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

Route::get('api/allstudent', 'StudentController@getAll');
Route::get('api/stuItem', 'StudentController@stuItem');
Route::get('api/class', 'StudentController@getClass');
Route::get('api/count', 'StudentController@count');
Route::get('api/realStu', 'StudentController@realStu');
Route::get('api/className', 'ClassController@className');
Route::get('api/clssList', 'ClassController@clssList');
Route::get('api/classLog', 'ClassController@classLog');
Route::get('api/getLog', 'ClassController@getLog');
Route::get('api/allLog', 'ClassController@allLog');

Route::post('api/login', 'LoginController@check');
Route::post('api/stueditor', 'StudentController@editor');
Route::post('api/addstudent', 'StudentController@add');
Route::post('api/removestudent', 'StudentController@remove');
Route::post('api/addClass', 'ClassController@addClass');
Route::post('api/addLog', 'ClassController@addLog');
Route::post('api/alterClass', 'ClassController@alterClass');
Route::post('api/uploadCover', 'ClassController@uploadCover');
Route::resource('test', 'bookController');
