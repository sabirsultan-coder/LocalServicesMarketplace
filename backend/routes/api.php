<?php
use App\Http\Controllers\Api\WorkerTypeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/worker-types/{categoryId}', [WorkerTypeController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/worker/profile', [WorkerController::class, 'store']);
    Route::get('/worker/profile', [WorkerController::class, 'show']);
    Route::put('/worker/profile', [WorkerController::class, 'update']);

});
