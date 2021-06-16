<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    // ROTTE LIBERE

// HOMEPAGE appartamenti in vetrina
Route::get('/homepage', 'MainController@homepage') -> name('homepage');
Route::get('/dashboard/{id}', 'HomeController@dashboard') -> name('dashboard');
Route::get('/myapartment/{id}', 'HomeController@myapartment') -> name('myapartment');
// Rotte per add e editing
Route::get('/add', 'HomeController@add') -> name('add');
Route::post('/add_function/{id}', 'HomeController@add_function')->name('add_function');
Route::get('/edit', 'HomeController@edit') -> name('edit');
Route::post('/edit_function/{id}', 'HomeController@edit_function')->name('edit_function');

Route::get('/statistic', 'HomeController@statistic') -> name('statistic');Route::get('/sponsor/{id}', 'HomeController@sponsor') -> name('sponsor');
Route::post('/sponsor_function/{id}', 'HomeController@sponsor_function')->name('sponsor_function');

// Dettagli appartamento
Route::get('/apartment/{id}','MainController@showApartment')->name('apartment');

// rotta registrazione
Route::post('/login','MainController@login')->name('login');

// Ricerca appartamento
// Route::get('/search/{id}/{address}','MainController@search')->name('searchApartment');
