<?php

use App\Http\Controllers\Api\V1\TodoController;
use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//http://appgreat.loc/api/v1/todos
Route::apiResource('v1/todos', TodoController::class)->only(['index','store','destroy'])->middleware(Cors::class);