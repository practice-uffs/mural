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

// Project
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project', 'ProjectController@store')->name('project.store');
Route::get('/project/{project}/edit', 'ProjectController@edit')->name('project.edit');
Route::get('/project/{project}', 'ProjectController@show')->name('project.show');
Route::patch('/project/{project}', 'ProjectController@update')->name('project.update');
Route::delete('/project/{project}', 'ProjectController@remove')->name('project.remove');

// Participation
Route::post('/participation/add', 'ParticipationController@add')->name('participation.add');
Route::patch('/participation/{participation}', 'ParticipationController@update')->name('participation.update');
Route::delete('/participation/{participation}', 'ParticipationController@remove')->name('participation.remove');

// Auth
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@auth');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Misc
Route::get('/info/users', 'InfoController@users')->name('info.users');
Route::get('/home', 'HomeController@index')->name('home');

if (App::environment('local')) {
    Route::get('/test', 'TestController@index');
}

// TODO: remove this cloujure
Route::get('/', function () {
    return view('welcome');
});
