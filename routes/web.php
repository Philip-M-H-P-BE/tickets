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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestsController@index')->name('publiclyaccessibletickets.list');
Route::get('/categories/{id}', 'GuestsController@show')->name('categories.show');


Route::group(['middleware' => 'auth'], function() {
	Route::get('/mijntickets', 'TicketsController@index')->name('mytickets.show');
	Route::get('/ticketformulier', 'TicketsController@create')->name('tickets.create');
});
