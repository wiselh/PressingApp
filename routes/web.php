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



Route::resource('/startup','StartupController');

Route::group(['middleware' => ['firstload']], function () {

    Auth::routes();

    Route::post('/admin/{id}','ProfileController@updateAdmin');
    Route::resource('/commandes','CommandeController');
    Route::resource('/factures','FactureController');
    Route::resource('/categories','CategorieController');
    Route::resource('/services','ServiceController');
    Route::resource('/clients','ClientController');


    Route::get('/pdf/{id}','ClientController@downloadPDF');

    Route::get('/home', 'HomeController@index')->name('home');

});





