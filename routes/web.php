<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    // ROTTE LIBERE

// HOMEPAGE appartamenti in vetrina
Route::get('pages/homepage', 'MainController@homepage') -> name('homepage');

//Ricerca avanzata
// Route::get('/search', 'MainController@search') -> name('search');
// Route::post('/search_function', 'HomeController@search_function')->name('search_function');

// // Rotte per add apartment
Route::get('/add', 'HomeController@add') -> name('add');
Route::post('/add_function', 'HomeController@add_function')->name('add_function');

// // Rotte per edit apartment
Route::get('/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('/edit_function/{id}', 'HomeController@edit_function')->name('edit_function');

// Rotta Add Sponsor
Route::get('/add_sponsor/{id}','HomeController@addSponsor')->name('add_sponsor');

// Rotta Soft-Delete
Route::get('/delete/{id}','HomeController@deleteApartment')->name('delete');

// Dettagli appartamento
Route::get('/apartment/{id}','MainController@showApartment')->name('apartment');


//Messaggio inviato
ROute::get('/send/{id}','MainController@send')-> name('send');

// rotta registrazione
Route::get('/login_ui','MainController@login_ui')->name('login_ui');
Route::get('/register','MainController@register')->name('register');


// Route::get('/statistic', 'HomeController@statistic') -> name('statistic');
// Route::get('/dashboard/{id}', 'HomeController@dashboard') -> name('dashboard');
// Route::get('/myapartment/{id}', 'HomeController@myapartment') -> name('myapartment');

// //Sponsor function
// Route::get('/sponsor/{id}', 'HomeController@sponsor') -> name('sponsor');
// Route::post('/sponsor_function/{id}', 'HomeController@sponsor_function')->name('sponsor_function');

//ROtte di debug(senza login)
// Route::get('/myapartment/{id}', 'MainController@myapartment') -> name('myapartment');
// Route::get('/pages/maps', 'MainController@maps') ;
// Route::get('/dashboard/{id}', 'MainController@dashboard') -> name('dashboard');
// Route::get('/add', 'MainController@add') -> name('add');
// Route::post('/add_function', 'MainController@add_function')->name('add_function');
// Route::get('/edit/{id}', 'MainController@edit') -> name('edit');
// Route::post('/edit_function/{id}', 'MainController@edit_function')->name('edit_function');
// Route::get('/sponsor/{id}', 'MainController@sponsor') -> name('sponsor');
// Route::get('/add_sponsor/{id}','MainController@addSponsor')->name('add_sponsor');
// Route::get('/statistic/{id}', 'MainController@statistic') -> name('statistic');
