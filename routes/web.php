<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    // ROTTE LIBERE

// HOMEPAGE appartamenti in vetrina
Route::get('pages/homepage', 'MainController@homepage') -> name('homepage');

// Route::get('/dashboard/{id}', 'HomeController@dashboard') -> name('dashboard');

// Route::get('/myapartment/{id}', 'HomeController@myapartment') -> name('myapartment');

//Ricerca avanzata
Route::get('/search', 'MainController@search') -> name('search');
Route::post('/search_function', 'HomeController@search_function')->name('search_function');

// Rotte per add apartment
// Route::get('/add', 'HomeController@add') -> name('add');
// Route::post('/add_function', 'HomeController@add_function')->name('add_function');

// Rotte per edit apartment
Route::get('/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('/edit_function/{id}', 'HomeController@edit_function')->name('edit_function');

// Rotta Add Sponsor
Route::get('/add_sponsor/{id}','HomeController@addSponsor')->name('add_sponsor');

// Rotta Soft-Delete
Route::get('/delete/{id}','HomeController@deleteApartment')->name('delete');

//sponsor function
Route::get('/sponsor/{id}', 'HomeController@sponsor') -> name('sponsor');
Route::post('/sponsor_function/{id}', 'HomeController@sponsor_function')->name('sponsor_function');

// Dettagli appartamento
Route::get('/apartment/{id}','MainController@showApartment')->name('apartment');

Route::get('/statistic', 'HomeController@statistic') -> name('statistic');

//Messaggio inviato
ROute::get('/send/{id}','MainController@send')-> name('send');
// rotta registrazione
Route::get('/login_ui','MainController@login_ui')->name('login_ui');
Route::get('/register','MainController@register')->name('register');

//ROtte di debug(senza login)
Route::get('/myapartment/{id}', 'MainController@myapartment') -> name('myapartment');
Route::get('/pages/maps', 'MainController@maps') ;
Route::get('/dashboard/{id}', 'MainController@dashboard') -> name('dashboard');
Route::get('/add', 'MainController@add') -> name('add');
Route::post('/add_function', 'MainController@add_function')->name('add_function');
