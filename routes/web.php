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
    return view('Pages/index');
});
Route::get('/index', function () {
    return view('Pages/index');
});
Route::get('/login', function () {
    return view('Authentication/Login');
});
Route::get('/register', function () {
    return view('Authentication/Register');
});
Route::get('/lock', function () {
    return view('Authentication/lock');
});

Route::get('/test', function () {
    return view('Pages/datatable');
});
Route::get('/tables1', function () {
    return view('Pages/tables1');
});
Route::get('/tables2', function () {
    return view('Pages/tables2');
});
Route::get('/profile', function () {
    return view('Pages/profile');
});

Route::get('/create', function () {
    return view('Pages/create');
});




//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
