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

//All of these route for development, remove when done ya future ammar
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


//development route habis sini, remove or u noob 


Route::post('/search', 'LogController@search');

Route::post('/addvehicle', 'PlateController@addPlate');

Auth::routes();

Route::get('/transaction', 'LogController@index')->middleware('auth');
Route::get('/remove/{plateid}', 'PlateController@remove')->middleware('auth');
Route::get('/addvehicle', function () {
    return view('addvehicle');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
