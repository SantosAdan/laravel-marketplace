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
        Route::get('/', ['as' => 'products.index', 'uses' => 'ProductController@index']);
        Route::get('/criar',['as'=>'products.create', 'uses'=>'ProductController@create']);
        Route::get('/meusprodutos',['as'=>'products.user', 'uses'=>'ProductController@user_products']);
        Route::get('/{id}/mostrar',['as'=>'products.show', 'uses'=>'ProductController@show']);
        Route::post('/cadastrar',['as'=>'products.store', 'uses'=>'ProductController@store']);
        Route::get('/{id}/editar',['as'=>'products.edit', 'uses'=>'ProductController@edit']);
        Route::put('/{id}/atualizar', ['as'=>'products.update', 'uses'=>'ProductController@update']);
        Route::post('/{id}/deletar', ['as' => 'products.delete', 'uses' => 'ProductController@destroy']);
        Route::get('/{category}',['as'=>'products.bycategory', 'uses'=>'ProductController@bycategory']);
    });

    Route::group(['prefix' => 'pedidos'], function () {
        Route::get('/meus', ['as' => 'orders.myOrders', 'uses' => 'OrderController@getMyOrders']);
        Route::get('/vendas', ['as' => 'orders.mySales', 'uses' => 'OrderController@getMySales']);
        Route::get('{orderId}', ['as' => 'orders.show', 'uses' => 'OrderController@show']);
        Route::post('{productId}/criar', ['as' => 'orders.create', 'uses' => 'OrderController@create']);
        Route::post('{productId}/salvar', ['as' => 'orders.store', 'uses' => 'OrderController@store']);
    });

    Route::group(['prefix' => 'pagseguro'], function () {
        Route::post('/notification', [
            'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
            'as' => 'pagseguro.notification'
        ]);
        Route::post('/return', [
            'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@redirect',
            'as' => 'pagseguro.redirect'
        ]);
        Route::get('/index', ['as' => 'pagseguro.index', 'uses' => 'PagSeguroController@index']);
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