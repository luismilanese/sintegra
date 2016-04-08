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

Route::get('/', 'ConsultController@search');

Route::match(['get', 'post'], 'search', 'ConsultController@search');
Route::get('results/{id}', 'ConsultController@showResult');
Route::get('results', 'ConsultController@results');

// API que pode aceita GET e POST e retorna JSON.
Route::match(['get', 'post'], 'consult/{cnpj}', 'ConsultController@consult');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
