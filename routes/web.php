<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// HOMEPAGE
Route::get('/homepage', 'MainController@homepage') -> name('homepage');
Route::get('/dashboard', 'HomeController@dashboard') -> name('dashboard');
