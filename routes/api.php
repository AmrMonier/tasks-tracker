<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('me')->middleware('auth:sanctum')->group(function (){
    Route::get('projects', [ProjectController::class, 'myProjects'])->name('projects.mine');
    Route::get('tasks', [TaskController::class, 'myTasks'])->name('tasks.mine');
});
Route::post('auth/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::apiResource('/projects', ProjectController::class)->middleware('auth:sanctum');
Route::apiResource('projects.tasks', TaskController::class)->except('index')->middleware('auth:sanctum');
// Route::get('/projects', [ProjectController::class, 'index']);