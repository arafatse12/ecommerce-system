<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', 'Auth\LoginController@loginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});
Route::middleware('auth')->group(function () {
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/home', 'RedirectController');
    Route::prefix('api')->group(function () {
        Route::resource('user', 'Api\UserController');
        Route::resource('product', 'Api\ProductController');
    });
    Route::get('/{any}', 'IndexController@singleApp')->where('any', '.*');
});
