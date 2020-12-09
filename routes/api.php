<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// ENDPOINT LOGIN
Route::post('auth/login', 'API\AuthController@login');

// ROUTES THAT NEED TOKEN AUTHENTICATION
Route::group(['middleware'=>['apiJwt']],function(){
    //ENDPOINTS AUTHORIZATIONS JWT
    Route::post('auth/logout', 'API\AuthController@logout');
    Route::post('auth/refresh', 'API\AuthController@refresh');
    Route::post('auth/me', 'API\AuthController@me');

    // ENDPOINT FEEDBACK SENSIVE
    Route::apiResource('feedbacks', 'API\FeedbackController')->only([
        'store', 'show', 'update'
    ]);
    // ENPOINTS SERVICES
    Route::apiResource('services', 'API\ServiceController')->only([
        'index', 'store', 'show', 'update'
    ]);
});

    Route::apiResource('service', 'API\ItemController');
    Route::get('service/{id}/comments', 'API\ItemController@listComments');
    Route::post('service/{id}/comments', 'API\ItemController@storeComment');
    
    // ENPOINT LOUSAS
    Route::apiResource('lousas', 'API\LousaController')->only(['index']);    

// ENDPOINTS FEEDBACK NOT SENSIVE
Route::apiResource('feedbacks', 'API\FeedbackController')->only(['index']);

// ENPOINT RESOURCES
Route::apiResource('reactions', 'API\ReactionController');
Route::apiResource('categories', 'API\CategoryController')->only(['index']);
Route::apiResource('locations', 'API\LocationController')->only(['index']);
Route::apiResource('documents', 'API\DocumentController');
Route::apiResource('specifications', 'API\SpecificationController')->only(['index']);

// ENDPOINTS GITHUB WEBHOOK
Route::post('webhook/github/comment', 'API\GithubWebhookController@issueComment');