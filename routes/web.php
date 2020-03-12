<?php

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

Route::get('/testlayout', function () {
    return view('layouts.layout1');
});

Route::get('/newlogin', function () {
    return view('auth.newlogin');
});

Route::get('/newregister', function () {
    return view('auth.newregister');
});

Route::get('/problem', function () {
    return view('problem');
});

Route::get('/notfound', function () {
    return view('notfound');
});

Route::post('/search', 'LogController@search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
