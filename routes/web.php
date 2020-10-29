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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('productsAdmin','DemoGetController@index');
Route::get('productsAdmin/destroy/{id}','DemoGetController@destroy');
Route::get('productsAdmin/edit/{id}','DemoGetController@edit');
Route::post('productsAdmin/update/{id}','DemoGetController@update');
Route::get('productsAdmin/create','DemoGetController@create');
Route::post('productsAdmin/store','DemoGetController@store');

