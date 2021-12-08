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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('create', 'RegistrationController@create');
Route::post('register', 'RegistrationController@registerUser');
Route::get('login', 'LoginController@login');
Route::group(['namespace' => 'Login'], function () {

//    Route::post('register','RegistrationController@registerUser');
});
