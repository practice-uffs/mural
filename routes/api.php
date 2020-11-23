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

// ENDPOINT AUTHORIZATION
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ENDPOINT ITEMS (DEPRECATED)
Route::apiResource('items', 'API\ItemController');
    Route::get('items/{id}/comments', 'API\ItemController@listComments');
    Route::post('items/{id}/comments', 'API\ItemController@storeComment');


// ENPOINDT LOUSAS
Route::apiResource('lousas', 'API\LousaController')->only([
    'index'
]);

// ENDPOINTS SERVICES
Route::apiResource('services', 'API\ServiceController')->only([
    'index', 'store', 'show', 'update'
]);
    Route::apiResource('service', 'API\ItemController');
        Route::get('service/{id}/comments', 'API\ItemController@listComments');
        Route::post('service/{id}/comments', 'API\ItemController@storeComment');

// ENDPOINTS FEEDBACK
Route::apiResource('feedbacks', 'API\FeedbackController')->only([
    'index', 'store', 'show', 'update'
]);

// ENPOINT RESOURCES
Route::apiResource('reactions', 'API\ReactionController');
Route::apiResource('categories', 'API\CategoryController')->only(['index']);
Route::apiResource('locations', 'API\LocationController')->only(['index']);
Route::apiResource('documents', 'API\DocumentController');
