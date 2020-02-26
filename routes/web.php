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

Route::get('/flights', function(){
  return view('flights.index');
});

Route::group(['prefix' => '/api'], function (){
  Route::get('/flights', 'Api\FlightsController@index');
  Route::get('/flights/filters', 'Api\FlightsController@filters');

});
