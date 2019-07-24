<?php


Route::post('coment', 'Posts\ComentController@store')->name('coment.store');
Route::resource('posts', 'Posts\PostController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
