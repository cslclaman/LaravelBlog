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

//Toda chamada à URL '/admin/post' vai executar o método "form" da classe (at class) "PostController"
Route::get('/admin/post', 'Admin\PostController@form');

Route::post('/admin/post/save', 'Admin\PostController@save');

//https://github.com/cslclaman/LaravelBlog.git