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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::post('/posts/search', 'PostController@search');
    Route::get('/posts/ranking', 'PostController@ranking');
    Route::get('/posts/{post}', 'PostController@show');
    Route::put('/posts/{post}', 'PostController@update');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/like/{id}', 'PostController@like')->name('reply.like');
    Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('reply.unlike');
});