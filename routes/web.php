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




Route::get('/installation','InstallationController@index')->middleware('installation');

Route::group(['middleware' => ['installation']], function () {

    Auth::routes();

    Route::post('/profile/{id}','ProfileController@updateAdmin');
    Route::resource('/commandes','CommandeController');
    Route::resource('/factures','FactureController');
    Route::resource('/categories','CategorieController');
    Route::resource('/services','ServiceController');
    Route::resource('/clients','ClientController');

    Route::get('/pdf/{id}','ClientController@downloadPDF');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'CommandeController@index');


});





