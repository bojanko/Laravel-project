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

Route::get('/', 'PageController@home');

Route::get('/post/{id}', 'PageController@showpost');
Route::post('/post/{id}', 'PageController@comment_post');

Route::get('/about', 'PageController@about');

Route::get('/contact', 'PageController@contact');
Route::post('/contact', 'PageController@contact_mail');


Route::get('/login', 'LoginController@login_page');
Route::post('/login', 'LoginController@login');

Route::get('/register', 'LoginController@register_page');
Route::post('/register', 'LoginController@register');

Route::get('/logout', 'LoginController@logout');

Route::get('/profile', 'LoginController@profile');
Route::post('/profile', 'LoginController@profile_update');
