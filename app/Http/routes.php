<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/', function () {
    return view('layouts.master');
});


Route::group(['prefix' => 'anuncios'],function(){
    Route::get('/', ['as' => 'index_anuncio', 'uses' => 'AdvertisementController@index']);
    Route::get('/criar',['as'=>'criar_anuncio', 'uses'=>'AdvertisementController@create']);
    Route::post('/cadastrar',['as'=>'cadastrar_anuncio', 'uses'=>'AdvertisementController@store']);
    Route::get('/{id}/editar',['as'=>'editar_anuncio', 'uses'=>'AdvertisementController@edit']);
    Route::put('/{id}/atualizar', ['as'=>'atualizar_anuncio', 'uses'=>'AdvertisementController@update']);
    Route::post('/{id}/deletar', ['as' => 'deletar_anuncio', 'uses' => 'AdvertisementController@destroy']);
});