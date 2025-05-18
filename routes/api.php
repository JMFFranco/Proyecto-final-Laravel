<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ComputerController;

Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');
Route::apiResource('computers', ComputerController::class)->middleware('auth:sanctum');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */
