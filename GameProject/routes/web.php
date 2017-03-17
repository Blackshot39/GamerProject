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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::resource('actualite', 'ActualiteController');    
    Route::resource('utilisateur', 'UserController');
    Route::resource('jeu', 'JeuController');
    Route::get('patate', 'HomeController@index');
});


Auth::routes();


