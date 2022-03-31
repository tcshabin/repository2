<?php

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

Route::get('/main', 'App\Http\Controllers\MainController@index');
Route::post('/main/checklogin', 'App\Http\Controllers\MainController@checklogin');
Route::post('/main/store', 'App\Http\Controllers\MainController@store');
Route::post('/main/update', 'App\Http\Controllers\MainController@Update_company');
Route::get('/main/company_delete/{id}', 'App\Http\Controllers\MainController@Delete_company');
Route::post('/main/create_employee', 'App\Http\Controllers\MainController@create_employee');
Route::post('/main/update_emplyee', 'App\Http\Controllers\MainController@update_employee');
Route::get('/main/delete_employee/{id}', 'App\Http\Controllers\MainController@Delete_Employee');
Route::get('main/employee_dashboard', 'App\Http\Controllers\MainController@employee_dashboard');
Route::get('main/dashboard', 'App\Http\Controllers\MainController@dashboard');
Route::get('main/logout', 'App\Http\Controllers\MainController@logout');