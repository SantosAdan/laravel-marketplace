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

Route::group(['middleware' => 'auth' ], function () {
    Route::get('/', function () {
        return view('layouts.master');
    });

    Route::get('profile', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::put('profile', ['as' => 'user.update', 'uses' => 'UserController@update']);

    Route::group(['prefix' => 'produtos'], function(){
        Route::get('/', ['as' => 'product.index', 'uses' => 'ProductController@index']);
        Route::get('/criar',['as'=>'product.create', 'uses'=>'ProductController@create']);
        Route::post('/cadastrar',['as'=>'product.store', 'uses'=>'ProductController@store']);
        Route::get('/{id}/editar',['as'=>'product.edit', 'uses'=>'ProductController@edit']);
        Route::put('/{id}/atualizar', ['as'=>'product.update', 'uses'=>'ProductController@update']);
        Route::post('/{id}/deletar', ['as' => 'product.delete', 'uses' => 'ProductController@destroy']);
    });

    Route::group(['prefix' => 'pedidos'], function () {
        Route::get('/', ['as' => 'orders.index', 'uses' => 'OrderController@index']);
        Route::get('{orderId}', ['as' => 'orders.show', 'uses' => 'OrderController@show']);
        Route::get('{productId}/criar', ['as' => 'orders.create', 'uses' => 'OrderController@create']);
        Route::post('{productId}/salvar', ['as' => 'orders.store', 'uses' => 'OrderController@store']);
    });

    // Images Route
    Route::get('/imagens/{folder}/{image?}/{size?}', ['as' => 'images', 'uses' => function($folder, $image, $size) {
        $path = storage_path() . '/app/' . $folder . '/' . $image;
        $img = Image::make($path)->resize(null, $size, function ($constraint) {
            $constraint->aspectRatio();
        });

        return $img->response();
    }]);
});