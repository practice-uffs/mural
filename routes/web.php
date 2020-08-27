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

Route::resource('/items', 'ItemController')->except([
    'create',
]);

// Auth
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Content
Route::get('/', 'ContentController@index')->name('content.index');
Route::get('/home', 'ContentController@index')->name('content.home');

if (App::environment('local')) {
    Route::get('/test', 'TestController@index');
}
