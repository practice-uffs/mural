<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

// Item
Route::get('/item/create', 'ItemController@create')->name('item.create');
Route::post('/item', 'ItemController@store')->name('item.store');
Route::get('/item/{item}/edit', 'ItemController@edit')->name('item.edit');
Route::get('/item/{item}', 'ItemController@show')->name('item.show');
Route::patch('/item/{item}', 'ItemController@update')->name('item.update');
Route::delete('/item/{item}', 'ItemController@remove')->name('item.destroy');

// Auth
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@auth');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Content
Route::get('/', 'ContentController@index')->name('content.index');
Route::get('/home', 'ContentController@index')->name('content.home');

if (App::environment('local')) {
    Route::get('/test', 'TestController@index');
}
