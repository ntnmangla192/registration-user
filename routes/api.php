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

//routes for user login
//api/login

Route::group(['namespace' => 'Login'], function () {
    Route::get('login', 'LoginController@login');

});
// api/register
Route::group(['namespace' => 'Registration'], function () {
    Route::post('register', 'RegistrationController@registerUser');

});
