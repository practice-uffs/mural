<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\FeedbacksController as AdminFeedbacksController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Livewire\FilePreviewHandler;
use App\Http\Controllers\Livewire\FileUploadHandler;
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

// Fix wrong style/mix urls when being served from reverse proxy
$proxy_url    = env('PROXY_URL');
$proxy_schema = env('PROXY_SCHEME');

if (!empty($proxy_url)) {
   URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
   URL::forceScheme($proxy_schema);
}

if (App::environment('local')) {
    Route::get('/test', [TestController::class, 'index']);
}

// Rotas públicas
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas');
Route::get('/servicos', [ServiceController::class, 'index'])->name('services');
Route::get('/avaliar/{orderEvaluation}/{hash}', [OrderEvaluationController::class, 'show'])->name('orderevaluation.show');

Route::view('/newsletter/subscribed', 'newsletter.subscribed')->name('newsletter.subscribed');

// Autenticação
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas autenticadas
Route::group(['middleware' => 'auth'], function () {
    Route::get('/inicial', [HomeController::class, 'index'])->name('home');
    Route::get('/servicos/solicitar/{service}', [OrderController::class, 'create'])->name('order.create');
    Route::get('/servicos/acompanhar', [OrderController::class, 'index'])->name('order.list');
    Route::get('/servico/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks');

    // Admin
    Route::group(['middleware' => 'check.admin'], function () {
        Route::get('/gerenciar/pedidos', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::get('/gerenciar/feedbacks', [AdminFeedbacksController::class, 'index'])->name('admin.feedbacks');    
        Route::get('/gerenciar/feedbacks/{feedback}', [AdminFeedbacksController::class, 'show'])->name('feedback.show');
        Route::get('/gerenciar/servicos', [AdminServiceController::class, 'index'])->name('admin.service');
        Route::get('/gerenciar/lugares', [LocationController::class, 'index'])->name('admin.location');
        Route::get('/gerenciar/categorias', [CategoryController::class, 'index'])->name('admin.category');
        Route::get('/gerenciar/usuarios', [UserController::class, 'index'])->name('admin.user');
        Route::get('/gerenciar/newsletter', [SubscriberController::class, 'index'])->name('admin.subscriber');
        Route::get('/gerenciar/pedidos/excluir/{id}', [AdminOrderController::class, 'destroy'])->name('order.destroy');
    });
});

// Corrige um bug no upload de arquivos no Livewire
Route::post('/livewire/upload-file', [FileUploadHandler::class, 'handle'])->name('livewire.upload-file')->middleware(config('livewire.middleware_group', ''));
Route::get('/livewire/preview-file/{filename}', [FilePreviewHandler::class, 'handle'])->name('livewire.preview-file')->middleware(config('livewire.middleware_group', ''));
