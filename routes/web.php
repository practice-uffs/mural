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
    'create', 'store'
]);

// Auth
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Content
// Routes for logged-in users
Route::group(['middleware' => ['auth']], function () {
    Route::get('/servicos', function(){ return view('pages/itens');});
    Route::get('/feedbacks', function(){ return view('pages/itens');});
});

Route::get('/', function(){ return view('index');});

if (App::environment('local')) {
    Route::get('/test', 'TestController@index');
}
