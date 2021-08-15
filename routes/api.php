<?php

use App\Http\Controllers\API\AuthController as AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\GithubWebhookController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ServiceController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Autenticação
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/is_valid', [AuthController::class, 'isTokenValid']);

// Gerência de modelos (serviço, pedido, etc)
Route::group(['as' => 'api.', 'middleware' => 'api.jwt'], function() {
    Orion::resource('feedbacks', 'API\FeedbackController');
    Orion::resource('orders', 'API\OrderController');
    Orion::resource('categories', 'API\CategoryController');
    Orion::resource('locations', 'API\LocationController');
    Orion::resource('services', 'API\ServiceController');
    Orion::resource('comments', 'API\CommentController');

    // Controle de autenticação
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/refresh', [AuthController::class, 'refresh']);
    Route::post('auth/me', [AuthController::class, 'me']);
});

// Misc (github, etc)
Route::post('webhook/github', [GithubWebhookController::class, 'index']);
Route::post('webhook/github/index.php', [GithubWebhookController::class, 'index']); // corrige problema na Dreamhost