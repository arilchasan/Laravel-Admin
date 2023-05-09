<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinasiController;
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

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/user', [AuthController::class, 'index']);


Route::get('/destinasi', [DestinasiController::class, 'index']);
Route::get('/destinasi/{id}', [DestinasiController::class, 'show']);
Route::post('/destinasi', [DestinasiController::class, 'store']);
Route::post('/destinasi/{id}', [DestinasiController::class, 'update']);
Route::delete('/destinasi/{id}', [DestinasiController::class, 'destroy']);
