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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
// Clients Controller
Route::group(['prefix' => 'client'], function (){
    Route::get('/list', 'ClientController@index')->name('client.list');
    Route::post('/store', 'ClientController@store')->name('client.store');
});
