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

//Agrupa rotas com algo em comum
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {

    //Toda chamada à URL '/admin/post' vai executar o método "form" da classe (at class) "PostController"
    //{id?} significa que ele pode receber um ID.. Ou não. Para ser obrigatório, tire o '?' -> {id}
    Route::get('/post/{id?}', 'PostController@form');

    Route::post('/post/save/{id?}', 'PostController@save');

    Route::get('/posts', 'PostController@list');

    Route::get('/post/{id}/delete', 'PostController@delete');
});