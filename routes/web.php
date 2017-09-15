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

Route::get('/profile', 'LoginController@profile')->middleware('protect.admin.pages');
Route::post('/profile', 'LoginController@profile_update')->middleware('protect.admin.pages');

Route::get('/profile/request', 'LoginController@request_admin')->middleware('protect.admin.pages');

Route::get('/admin', 'AdminController@home')->middleware('protect.admin.pages.admin');

Route::get('/admin/about', 'AdminController@about')->middleware('protect.admin.pages.admin');
Route::post('/admin/about', 'AdminController@about_modify')->middleware('protect.admin.pages.admin');

Route::get('/admin/contact', 'AdminController@contact')->middleware('protect.admin.pages.admin');
Route::post('/admin/contact', 'AdminController@contact_modify')->middleware('protect.admin.pages.admin');

Route::get('/admin/comments', 'AdminController@comments')->middleware('protect.admin.pages.admin');
Route::get('/admin/comments/approve/{id}', 'AdminController@comments_approve')->middleware('protect.admin.pages.admin');
Route::get('/admin/comments/delete/{id}', 'AdminController@comments_delete')->middleware('protect.admin.pages.admin');

Route::get('/admin/adminrequests', 'AdminController@adminrequests')->middleware('protect.admin.pages.admin');
Route::get('/admin/adminrequests/approve/{user_id}_{req_id}', 'AdminController@adminrequests_approve')->middleware('protect.admin.pages.admin');
Route::get('/admin/adminrequests/disapprove/{req_id}', 'AdminController@adminrequests_disapprove')->middleware('protect.admin.pages.admin');

Route::get('/admin/manageuser', 'AdminController@manageuser')->middleware('protect.admin.pages.admin');
Route::get('/admin/manageuser/revokeadmin/{id}', 'AdminController@manageuser_revokeadmin')->middleware('protect.admin.pages.admin');
Route::get('/admin/manageuser/delete/{id}', 'AdminController@manageuser_delete')->middleware('protect.admin.pages.admin');
