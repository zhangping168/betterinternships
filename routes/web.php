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

Route::group(['middleware'=>'auth', 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
	Route::get('/', 'HomeController@index');
	Route::resource('posts', 'PostsController');

});

Route::get('posts/{id}', 'PostsController@show');
Route::post('comment','CommentsController@store');

