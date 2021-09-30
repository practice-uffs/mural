<?php

use App\Http\Controllers\API\GithubWebhookController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

// Gerência de modelos (serviço, pedido, etc)
Route::group(['as' => 'api.', 'middleware' => 'jwt.practice'], function() {
    Orion::resource('ideas', 'API\IdeaController');
    Orion::resource('feedbacks', 'API\FeedbackController');
    Orion::resource('orders', 'API\OrderController');
    Orion::resource('categories', 'API\CategoryController');
    Orion::resource('locations', 'API\LocationController');
    Orion::resource('services', 'API\ServiceController');
    Orion::resource('comments', 'API\CommentController');

    if (App::environment('local')) {
        Route::get('/ping', function() { 
            return response()->json(['pong' => Auth::user()]);
        });
    }
});

// Misc (github, etc)
Route::post('webhook/github', [GithubWebhookController::class, 'index']);
Route::post('webhook/github/index.php', [GithubWebhookController::class, 'index']); // corrige problema na Dreamhost