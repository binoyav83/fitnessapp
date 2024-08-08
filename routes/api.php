<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StepController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::get('steps', [StepController::class, 'index'])->middleware('auth:sanctum');
Route::post('steps', [StepController::class, 'store'])->middleware('auth:sanctum');