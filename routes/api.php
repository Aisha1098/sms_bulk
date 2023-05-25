<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('accounts', AccountController::class);
Route::apiResource('contacts', ContactController::class);
Route::apiResource('groups', GroupController::class);
Route::apiResource('packages', PackageController::class);
Route::apiResource('templates', TemplateController::class);
Route::apiResource('recipients', RecipientController::class);
Route::apiResource('messages', MessageController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);