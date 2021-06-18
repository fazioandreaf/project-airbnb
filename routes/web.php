<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    // ROTTE LIBERE

// HOMEPAGE appartamenti in vetrina
Route::get('pages/homepage', 'MainController@homepage') -> name('homepage');

Route::get('/dashboard/{id}', 'HomeController@dashboard') -> name('dashboard');

Route::get('/myapartment/{id}', 'HomeController@myapartment') -> name('myapartment');

// Rotte per add e editing
Route::get('/add', 'HomeController@add') -> name('add');
Route::post('/add_function', 'HomeController@add_function')->name('add_function');

Route::get('/edit', 'HomeController@edit') -> name('edit');
Route::post('/edit_function/{id}', 'HomeController@edit_function')->name('edit_function');


Route::get('/sponsor/{id}', 'HomeController@sponsor') -> name('sponsor');
Route::post('/sponsor_function/{id}', 'HomeController@sponsor_function')->name('sponsor_function');

// Dettagli appartamento
Route::get('/apartment/{id}','MainController@showApartment')->name('apartment');

Route::get('/statistic', 'HomeController@statistic') -> name('statistic');

// rotta registrazione
Route::get('/login_ui','MainController@login_ui')->name('login_ui');


Route::get('/debugdanny/{id}', 'MainController@debugdanny') ;
