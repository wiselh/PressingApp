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

Route::get('/installation','InstallationController@index')->middleware('redirect_installation');
Route::post('/installation','InstallationController@store');
//Route::get('/installation','InstallationController@index')->middleware();


Route::group(['middleware' => ['installation']], function () {

    Auth::routes();

    Route::resource('/societe','SocieteController');
    Route::resource('/profile','ProfileController');

    Route::resource('/users','UserController');
    Route::post('/users/update/{id}','UserController@update');
    Route::get('/users/delete/{id}','UserController@destroy');

    Route::post('/profile/password/{id}','ProfileController@updatePassword');
    Route::post('/profile/{id}','ProfileController@updateAdmin');
    Route::resource('/commandes','CommandeController');
    Route::resource('/factures','FactureController');
    Route::resource('/vetements','VetementController');

    Route::resource('/categories','CategorieController');
    Route::resource('/services','ServiceController');

    Route::resource('/clients','ClientController');
    Route::get('/clients/delete/{id}','ClientController@destroy');

    Route::get('/all-commandes','FactureController@allCommandes');

    Route::resource('/impression','ImpressionController');
    Route::get('/impression/ticket/{id}','ImpressionController@ticket');
    Route::get('/impression/facture/{id}','ImpressionController@facture');
    Route::get('/impression/codebar/{id}','ImpressionController@codebar');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'CommandeController@index');
    Route::get('/sweet', 'UserController@sweet');


//    Route::get('/test', 'CommandeController@test');


});





