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
Route::group(['middleware' => ['Ban'], 'except' => 'showLoginForm'], function() {
  

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Statut']], function () {

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
        Route::get('/','HomeController@admin')->name('admin.home');
        Route::delete('typejeu/{id}/jeu{idJeu}', 'TypeJeuController@retirer')->name('typejeu.retirer');
    });


    Auth::routes();

    //route du site public
    Route::get('/','HomePublicController@index')->name('homePublic.index');
    Route::resource('sujet', 'SujetController');


    Route::get('/jeu','JeuController@indexFront')->name('jeu.indexFront');
    Route::get('/jeu/{id}','JeuController@showUser')->name('jeu.showUser');
    Route::get('/jeu/info/{id}','JeuController@showJeu')->name('jeu.showJeu');
    Route::put('jeu/{id}/ajouter', 'JeuController@ajouter')->name('jeu.ajouter');
    Route::put('user/{id}/retirer', 'JeuController@retirer')->name('jeu.retirer');

    Route::get('test', function(){
        return view('front/test');
    })->name('test');

    Route::put('sujet/{id}/repondre', 'PosteController@repondre')->name('poste.repondre');
    Route::put('sujet/{id}/fermer', 'SujetController@fermer')->name('sujet.fermer');
    Route::put('sujet/{id}/ouvrir', 'SujetController@ouvrir')->name('sujet.ouvrir');
    Route::resource('poste', 'PosteController');
    Route::get('profil/{id}','UserController@profilFront')->name('user.profilFront');
    Route::resource('message', 'MessageController');
    Route::get('message/create/destinataire/{id}','MessageController@createFront')->name('message.createFront');
    Route::get('sujet/jeu/{idJeu}', 'SujetController@sujetsUnJeu')->name('sujet.sujetsUnJeu');

    Route::get('actualite','ActualiteController@indexFront')->name('actualite.indexFront');
    Route::post('message/store/{id}','MessageController@storeFront')->name('message.storeFront');
    Route::get('mon-profil','UserController@meFront')->name('user.meFront');
    Route::put('mon-profil/{id}', 'UserController@meFrontPut')->name('user.meFrontPut');
    Route::get('mes-jeux', 'JeuController@mesJeux')->name('jeu.mesJeux');
    Route::put('mes-jeux/{id}/activite', 'JeuController@activite')->name('jeu.activite');
    Route::get('actualite/{id}','ActualiteController@showFront')->name('actualite.showFront');
    Route::resource('commentaire', 'CommentaireController');
    Route::put('commentaire/storeFront/actualite/{id}', 'CommentaireController@storeFront')->name('commentaire.storeFront');













});