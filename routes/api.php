<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\CounterController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\AboutUsController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('settings', SettingController::class);
Route::get('sliders', SliderController::class);
Route::get('services', ServiceController::class);
Route::get('counters', CounterController::class);
Route::get('projects', ProjectController::class);
Route::get('projects/{id}', [ProjectController::class, 'show']);
Route::get('projects/{id}/images', [ProjectController::class, 'images']);
Route::get('categories', CategoryController::class);
Route::post('messages', MessageController::class);
Route::get('about-us', AboutUsController::class);
