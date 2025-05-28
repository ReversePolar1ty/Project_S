<?php

use App\Http\Controllers\API\WorkerApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('workers', [WorkerApiController::class, 'index']);
Route::get('workers/{worker}', [WorkerApiController::class, 'show']);
Route::post('workers', [WorkerApiController::class, 'store']);
Route::patch('workers/{worker}', [WorkerApiController::class, 'update']);
Route::delete('workers/{worker}', [WorkerApiController::class, 'destroy']);
