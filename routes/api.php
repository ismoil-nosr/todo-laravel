<?php

use App\Http\Controllers\Api\TasksController;
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
    return $request->user('api');
});

Route::apiResource('tasks', TasksController::class);
Route::post('tasks/bulkDelete', [TasksController::class, 'bulkDelete']);
Route::post('tasks/bulkComplete', [TasksController::class, 'bulkComplete']);