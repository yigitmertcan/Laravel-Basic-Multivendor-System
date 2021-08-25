<?php

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

//Genel koltroller
Route::get('/', 'App\Http\Controllers\firstlogin@logincheck');
Route::post('/checklogin','App\Http\Controllers\firstlogin@postRegister');
Route::get('/close', 'App\Http\Controllers\firstlogin@close');


//Her kullanıcı olan
Route::get('/setting', 'App\Http\Controllers\setting@logincheck');
Route::get('/lang/{tur?}','App\Http\Controllers\setting@lang');


//Adminlerde olan
Route::get('/adduser/{tur}/{id?}', 'App\Http\Controllers\adduser@logincheck');

//Systemuser olan
Route::get('/brief/{id}', 'App\Http\Controllers\addmerchant@logincheckbrief');

//Superadminlerde olan
Route::get('/manage/{tur}', 'App\Http\Controllers\manage@logincheck');
Route::get('/add/{tur}/{id?}', 'App\Http\Controllers\add@logincheck');
Route::get('/addmerchant/{id?}', 'App\Http\Controllers\addmerchant@logincheck');
Route::get('/addcontract/{id?}', 'App\Http\Controllers\contractcon@logincheck');
Route::post('/wantcontract','App\Http\Controllers\contractcon@add');
Route::post('/addmerchants','App\Http\Controllers\addmerchant@add');
Route::post('/wantadduser/{tur}','App\Http\Controllers\add@add');
Route::get('/delete/{tur}/{id}','App\Http\Controllers\add@delete');


//cop olan
Route::get('/hello', function () {
    return view('superadmin/brief');
});

Route::get('/hello2/{id?}', function ($id=null) {
    return View("superadmin/adduser")->with('students',$id);
});

Route::get('/login', function () {
    return view('login');
});