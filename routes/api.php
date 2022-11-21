<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth'], function ($api) {
    $api->post('login', 'AuthController@login');
    $api->get('logout', 'AuthController@logout');
    $api->post('register', 'RegisterController@register');
});

Route::group(['middleware' => ['jwt.auth', 'jwt.refresh'], 'namespace' => 'Api'], function ($api) {

    $api->resource('feedback', 'FeedbackController');
    $api->resource('answer', 'AnswerController');
});
