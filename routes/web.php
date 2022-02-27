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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/addarticle', 'HomeController@addArticle')->name('addarticle');
Route::get('/chat/{id}', 'MessageController@index')->name('chat');
Route::get('/getmessage/{id}', 'MessageController@getmessage')->name('getmessage');
Route::post('/sendmessage', 'MessageController@sendMessage')->name('sendmessage');
