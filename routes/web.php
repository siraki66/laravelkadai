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


Route::get('/', 'PostsController@index');
Route::post('/', 'PostsController@index');


Route::get('/posts/{phone}', 'PostsController@show')->where('phone', '[0-9]+');



 Route::get('/posts/{phone}/edit', 'PostsController@edit');
 Route::patch('/posts/{phone}', 'PostsController@update');

 Route::delete('/posts/{phone}', 'PostsController@destroy');


 Route::get('/search', 'PostsController@search');



 Route::post('/search2', 'PostsController@search2');



 Auth::routes();

 Route::get('/posts/customer_input', 'PostsController@signup');
 Route::get('/posts/login', 'PostsController@login');

 //会員登録
 Route::post('/posts/customer_output', 'PostsController@signup_out');


 //ログイン
 Route::post('/posts/login_output', 'PostsController@login_out');
 Route::post('/posts/login', 'PostsController@login');

 //ログアウト
 Route::get('/posts/logout', 'PostsController@logout');


 Route::get('/posts/create', 'PostsController@create'); 


 Route::post('/posts/create', 'PostsController@post_create');



