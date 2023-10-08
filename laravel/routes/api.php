<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[UserController::class,'login']);
Route::post('/signup',[UserController::class,'signup']);
Route::post('/logout',[UserController::class,'logout']);

// Route::get('/get_tasks',[TaskController::class,'show']);
Route::post('/create_task',[TaskController::class,'create']);
Route::put('/update_task/{id}',[TaskController::class,'update']);
Route::delete('/delete_task/{id}',[TaskController::class,'destroy']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/user/tasks', 'TaskController@show');
// });
// Example of protected route in routes/api.php
Route::middleware('auth:sanctum')->get('/user/tasks', [TaskController::class,'show']);



