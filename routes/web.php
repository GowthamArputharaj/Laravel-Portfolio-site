<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Dbcontroller@index');

Route::get('/about', function(){
    return view('pages.about');
})->named('about');

Route::get('/contact', function(){
    return view('pages.contact');
})->named('contact');


Route::resource('study', 'Dbcontroller');

Route::get('/emaill', 'HomeController@mail');

/* For Authentication */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function(){
    return view('delete.nothing');
});