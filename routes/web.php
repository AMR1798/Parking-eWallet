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

use Illuminate\Http\Request;

use App\Plate; 

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

//All of these route for development, remove before publishing pls :(
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

Route::get('/dummybank', function () {
    if (session()->has('fund')){
    return view('bank');
    }else{
        return redirect('/home');
    }
})->name('dummybank');

Route::get('/fakeexit', 'LogController@fakeExitView');
Route::post('/fakeexit', 'LogController@fakeExit');

Route::get('/fakeentry', function () {
    return view('fakeentry');
});

Route::post('/fakeentry', 'LogController@fakeEntry');


//development route habis sini, remove or u noob 



//entah

Auth::routes();

Route::get('/search', 'LogController@search');





Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/addvehicle', 'PlateController@addPlate')->middleware('auth');
    Route::post('/addbalance', 'BalanceController@addbalance')->middleware('auth');
    Route::get('/parking', 'LogController@index')->middleware('auth');
    Route::get('/remove/{plateid}', 'PlateController@remove')->middleware('auth');
    Route::get('/paymentlogs', 'PaymentlogController@show')->middleware('auth');
    Route::get('/profile', 'UserController@editprofile')->middleware('auth');
    Route::put('/emailupdate', 'UserController@emailupdate')->middleware('auth');
    Route::put('/phoneupdate', 'UserController@phoneupdate')->middleware('auth');
    Route::post('/passwordupdate', 'ChangePasswordController@store')->name('change.password');
    Route::get('/addvehicle', function () {
        return view('addvehicle');
    })->middleware('auth');
    Route::get('/addbalance', function () {
        return view('addbalance');
    })->middleware('auth');

    //dummy bank route
    Route::post('/bank', 'DummyBankController@bankTransaction');
    Route::get('/bankaccept', 'BalanceController@accept')->name('transactionaccepted');
});


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'LogController@adminview');
    Route::get('/admin-parking-logs', 'LogController@viewAll');
    Route::get('/admin-parking-logs/filter', 'LogController@viewAllFilter')->name('log.filter');
    Route::get('/pricing', 'PriceController@index');
    Route::put('/setprice', 'PriceController@update');
    Route::get('/admin-payment-logs', 'PaymentlogController@index');
    Route::get('/admin-payment-logs/filter', 'PaymentlogController@indexFilter')->name('payment.filter');
    Route::get('/admin-payment-overview', 'PaymentlogController@adminview');
    Route::get('/admin-user-view', 'UserController@adminview');
    Route::get('/admin-vehicle-view/search', 'plateController@search')->name('vehicle.search');
    Route::get('/admin-vehicle-view', 'plateController@adminview');
    Route::get('/admin-vehicle-view/{vehicleid}', 'plateController@adminviewvehicle');
    Route::get('/admin-user-view/search/', 'userController@search')->name('user.search');
    Route::get('/admin-user-view/{id}', 'userController@adminviewuser');
    Route::get('/admin-remove-plate/{plateid}', 'PlateController@adminRemove');
});


