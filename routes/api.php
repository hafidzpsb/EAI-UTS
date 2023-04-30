<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\API'], function() {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('articles', [App\Http\Controllers\ArticleController::class, 'index']);
    Route::get('articles/{id}', [App\Http\Controllers\ArticleController::class, 'show']);
    Route::post('articles', [App\Http\Controllers\ArticleController::class, 'store']);
    Route::put('articles/{id}', [App\Http\Controllers\ArticleController::class, 'update']);
    Route::delete('articles/{id}', [App\Http\Controllers\ArticleController::class, 'delete']);
});