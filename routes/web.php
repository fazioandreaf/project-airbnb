<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    // ROTTE LIBERE

// HOMEPAGE appartamenti in vetrina
Route::get('/homepage', 'MainController@homepage') -> name('homepage');

// Dettagli appartamento
Route::get('/apartment/{id}','MainController@showApartment')->name('apartment');

// rotta registrazione
Route::get('/login','MainController@login')->name('login');

// Ricerca appartamento
// Route::get('/search/{id}/{address}','MainController@search')->name('searchApartment');