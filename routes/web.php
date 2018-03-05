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




<<<<<<< HEAD
Route::get('/installation','InstallationController@index')->middleware('redirect_installation');
Route::post('/installation','InstallationController@store');


=======
Route::get('/installation','InstallationController@index')->middleware('installation');
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347

Route::group(['middleware' => ['installation']], function () {

    Auth::routes();

<<<<<<< HEAD
    Route::resource('/profile','ProfileController');
    Route::resource('/users','UserController');
    Route::post('/profile/password/{id}','ProfileController@updatePassword');
=======
    Route::post('/profile/{id}','ProfileController@updateAdmin');
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347
    Route::resource('/commandes','CommandeController');
    Route::resource('/factures','FactureController');
    Route::resource('/categories','CategorieController');
    Route::resource('/services','ServiceController');
    Route::resource('/clients','ClientController');

    Route::get('/pdf/{id}','ClientController@downloadPDF');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'CommandeController@index');

<<<<<<< HEAD

=======
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347

});





