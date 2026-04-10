<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiProductController;

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/users', [ApiAuthController::class, 'users']);

    Route::get('/product/inquiry', [ApiProductController::class, 'inquiry']);
    Route::post('/product', [ApiProductController::class, 'store']);
    Route::put('/product/{id}', [ApiProductController::class, 'update']);
    Route::delete('/product/{id}', [ApiProductController::class, 'destroy']);
});
