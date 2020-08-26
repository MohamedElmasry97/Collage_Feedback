<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'API'], function () {
    Route::post('login', 'MainController@studentLogin')->name('api.login');
    Route::post('reset_password', 'MainController@ResetPassword');
    Route::post('new_password', 'MainController@newPasswordSet');

    Route::get('list_courses', 'MainController@listCourses');
    Route::get('feedback', 'MainController@feedbackForm');
    Route::post('submit_feedback', 'MainController@submitFeedbackForm');
    Route::group(['middleware' => 'auth:api'], function () {
    });
});
