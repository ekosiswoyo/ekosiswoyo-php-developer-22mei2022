<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ExperienceController;

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


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('experience', [ExperienceController::class, 'all']);
    Route::post('experience', [ExperienceController::class, 'store']);
    Route::post('experience/update', [ExperienceController::class, 'update']);
    Route::delete('experience/{id}', [ExperienceController::class, 'destroy']);

});


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
