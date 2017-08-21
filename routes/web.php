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
/*	vervangen door homepage met globaal overzicht van alle support tickets!!!
Route::get('/', function () {
    return view('welcome');
});
*/

/* door Laravel gegenereerd, afblijven!!! */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/* afblijven!!! */


/* zelf gedefinieerde routes */
Route::get('/', 'GuestsController@index')->name('publiclyaccessibletickets.list');
Route::get('/categories/{id}/tickets', 'TicketsController@expandCategoryLink')->name('tickets_per_category');



/* alleen voor ingelogden!!! */
Route::group(['middleware' => 'auth'], function() {
	Route::get('/mijntickets', 'TicketsController@showMyTickets')->name('mytickets.show');
	Route::get('/tickets/{id}', 'TicketsController@show')->name('tickets.show');
	Route::get('/ticketformulier', 'TicketsController@create')->name('tickets.create');
	Route::post('/registreerticket', 'TicketsController@store')->name('tickets.store');
	Route::get('/tickets/{id}/edit', 'TicketsController@edit')->name('tickets.edit');
	Route::put('/tickets/{id}', 'TicketsController@update')->name('tickets.update');
});
