<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderEvaluationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestController;
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
    Route::get('/test', [TestController::class, 'index']);
}

// Rotas públicas
Route::view('/', 'index')->name('index');
Route::view('/newsletter/subscribed', 'newsletter.subscribed')->name('newsletter.subscribed');
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas');
Route::get('/avaliar/{orderEvaluation}/{hash}', [OrderEvaluationController::class, 'show'])->name('orderevaluation.show');

// Autenticação
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas autenticadas
Route::group(['middleware' => 'auth'], function () {
    Route::get('/inicial', [HomeController::class, 'index'])->name('home');
    Route::get('/servicos/solicitar', [ServiceController::class, 'index'])->name('services');
    Route::get('/servicos/solicitar/{service}', [OrderController::class, 'create'])->name('order.create');
    Route::get('/servicos/acompanhar', [OrderController::class, 'index'])->name('order.list');
    Route::get('/servico/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks');

    // Admin
    Route::group(['middleware' => 'check.admin'], function () {
        Route::get('/gerenciar/pedidos', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::get('/gerenciar/servicos', [AdminServiceController::class, 'index'])->name('admin.service');
        Route::get('/gerenciar/lugares', [LocationController::class, 'index'])->name('admin.location');
        Route::get('/gerenciar/categorias', [CategoryController::class, 'index'])->name('admin.category');
        Route::get('/gerenciar/usuarios', [UserController::class, 'index'])->name('admin.user');
    });
});