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

Auth::routes();


Route::post('/admin/{id}','ProfileController@updateAdmin');
Route::resource('/factures','FactureController');
Route::resource('/categories','CategorieController');
Route::resource('/services','ServiceController');
Route::resource('/clients','ClientController');

Route::get('/pdf/{id}','ClientController@downloadPDF');


Route::get('/tst',  function () {
    return view('Pages.template');
});
Route::post('/tst', 'FactureController@tst');


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home',  function () {
    return view('Pages.Facture.create');
})->name('home');

Route::get('/count', 'HomeController@commandesCounter');







