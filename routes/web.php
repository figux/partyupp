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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/bares', 'BaresController@index')->name('bares');
Route::get('/bar', 'BaresController@new')->name('barCrear');
Route::post('/bar', 'BaresController@store')->name('barSave');
Route::get('/bar/{id}/edit', 'BaresController@edit')->name('barEdit');
Route::post('/bar/{id}/edit', 'BaresController@update')->name('barUpdate');
Route::get('/bar/{id}', 'BaresController@destroy')->name('barDelete');
Route::post('/search', 'HomeController@search')->name('searchBar');
Route::post('/rate', 'HomeController@rate')->name('rateBar');
Route::post('/actualizarBar', 'HomeController@actualizar')->name('actualizarBar');

