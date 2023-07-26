<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventnameController;
use App\Http\Controllers\EventscheduleController;
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

Route::resource('contact',ContactController::class);
Route::resource('about',AboutController::class);
Route::resource('artist',ArtistController::class);
Route::resource('eventname',EventnameController::class);
Route::resource('eventschedule',EventscheduleController::class);