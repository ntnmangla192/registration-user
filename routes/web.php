<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/create', 'RegistrationController@create');

//routes for registration of user

Route::group(['namespace' => 'Registration'], function () {
    Route::get('/create', 'RegistrationController@create');
    Route::post('/register', 'RegistrationController@registerUser');
});

//routes for login of user
Route::group(['namespace' => 'Login'], function () {
    Route::get('/login', 'LoginController@loginPage');
    Route::post('/login-user', 'LoginController@loginUser');
});
