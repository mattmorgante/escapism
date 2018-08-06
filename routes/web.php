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

Route::get('/', 'PhotosController@home');
Route::get('/places/{slug}', 'PhotosController@show');
Route::get('/map', 'PhotosController@map');

Route::get('/tags', 'TagsController@index');
Route::get('/tag/{tag}', 'TagsController@show');
