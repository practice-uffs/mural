<?php

use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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
if (App::environment('local')) {
    Route::get('/test', 'TestController@index');
    Route::get('/order', [OrderController::class, 'index']);
}

// Index
Route::view('/', 'index')->name('home');
Route::view('/newsletter/subscribed', 'newsletter.subscribed')->name('newsletter.subscribed');

// Auth
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Routes autenticadas
Route::group(['middleware' => ['auth']], function () {
    Route::get('/inicial', [HomeController::class, 'index'])->name('home');
    Route::get('/lousas','LousaController@index')->name('lousas');
    Route::get('/servicos/acompanhar','ServiceController@acompanhar')->name('servicos/acompanhar');
    Route::get('/servicos/solicitar','ServiceController@solicitar')->name('servicos/solicitar');
    Route::resource('/servico', 'ItemController')->except(['create', 'store','update']);
    Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks');
    Route::resource('/feedback', 'ItemController')->except(['create', 'store','edit','update']);

    // Admin
    Route::get('/admin', 'AdminController@index')->name('admin')->middleware('check.admin');
    
    // TODO: adicionar para check.admin
    Route::get('/gerenciar/lugares', [LocationController::class, 'index'])->name('admin.places');
});