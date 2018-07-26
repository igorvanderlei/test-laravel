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



Route::middleware('autorizacao')->group(function() {
	Route::get('funcionario/create', 'FuncionarioController@create');
	Route::get('funcionario/delete', 'FuncionarioController@delete');
	Route::post('funcionario/store', 'FuncionarioController@store');
	Route::get('funcionario/all', 'FuncionarioController@all');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
