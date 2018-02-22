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
    return view('Layouts/home');
});
Route::get('/index', function () {
    return view('Layouts/home');
});
Route::get('/login', function () {
    return view('Authentication/Login');
});
Route::get('/register', function () {
    return view('Authentication/Register');
});
Route::get('/lock', function () {
    return view('Errors/404');
});
Route::get('/commandes', function () {
    return view('Pages/commandes');
});
Route::get('/test', function () {
    return view('Pages/datatable');
});
Route::get('/orders', function () {
    return view('Pages/orders');
});
Route::get('/order', function () {
    return view('Pages/order');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
