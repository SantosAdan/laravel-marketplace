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
});

// Images Route
Route::get('/imagens/{folder}/{image?}/{size?}', ['as' => 'images', 'uses' => function($folder, $image, $size) {
    $path = storage_path() . '/app/' . $folder . '/' . $image;
    $img = Image::make($path)->resize(null, $size, function ($constraint) {
        $constraint->aspectRatio();
    });

    return $img->response();
}]);