<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('angular2');
});

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'Auth\AuthController@login');
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('status', 'Auth\AuthController@status');
    });

    Route::group(['prefix' => 'learn', 'middleware' => ['auth.check']], function () {
        Route::get('stage', 'Learn\StageController@stage');
        Route::put('stage', 'Learn\StageController@update');
        Route::post('confirm', 'Learn\ConfirmController@confirm');
        Route::post('knowledge', 'Learn\KnowledgeController@post');
        Route::post('nature', 'Learn\NatureController@post');
        Route::post('test', 'Learn\TestController@post');
        Route::post('satisfy', 'Learn\SatisfyController@post');
    });
});