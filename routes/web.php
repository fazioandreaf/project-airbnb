<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// HOMEPAGE
Route::get('/homepage', 'MainController@homepage') -> name('homepage');
Route::get('/dashboard/{id}', 'HomeController@dashboard') -> name('dashboard');
Route::get('/myapartment/{id}', 'HomeController@myapartment') -> name('myapartment');
Route::get('/add', 'HomeController@add') -> name('add');
Route::post('/add_function/{id}', 'HomeController@add_function')->name('add_function');
Route::get('/statistic', 'HomeController@statistic') -> name('statistic');Route::get('/sponsor/{id}', 'HomeController@sponsor') -> name('sponsor');
Route::post('/sponsor_function/{id}', 'HomeController@sponsor_function')->name('sponsor_function');
