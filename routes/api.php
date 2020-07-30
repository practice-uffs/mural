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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('items', 'API\ItemController');
    Route::get('items/{id}/comments', 'API\ItemController@listComments');
    Route::post('items/{id}/comments', 'API\ItemController@storeComment');

Route::apiResource('reactions', 'API\ReactionController');

Route::get('/conf', 'API\ConfigController@homerConfig');
