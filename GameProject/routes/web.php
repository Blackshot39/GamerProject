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
    Route::resource('user', 'UserController');
    Route::resource('jeu', 'JeuController');
    Route::get('patate', 'HomeController@index');
    Route::get('/me', 'UserController@myAccount')->name('user.myAccount');
    Route::put('/me/{id}', 'UserController@myAccountPut')->name('user.myAccountPut');
    Route::resource('typejeu', 'TypeJeuController');
    Route::resource('categorie', 'CategorieController');
    Route::put('user/{id}/ban', 'UserController@ban')->name('user.ban');
    Route::put('user/{id}/deban', 'UserController@deban')->name('user.deban');
    Route::get('/jeu/addtype/{id}','JeuController@addTypeJeu')->name('jeu.addTypeJeu');
    Route::put('/jeu/store/{id}','JeuController@storeTypeJeu')->name('jeu.storeTypeJeu');
});


Auth::routes();

//route du site public
Route::get('/','HomePublicController@index')->name('homePublic.index');
Route::resource('forum', 'SujetController');


Route::get('/jeu','JeuController@indexFront')->name('jeu.indexFront');
Route::put('jeu/{id}/ajouter', 'JeuController@ajouter')->name('jeu.ajouter');
Route::put('user/{id}/retirer', 'JeuController@retirer')->name('jeu.retirer');

Route::get('test', function(){
    return view('front/test');
})->name('test');