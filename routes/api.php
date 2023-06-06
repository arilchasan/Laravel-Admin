<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;

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
//login-register
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::delete('/auth/delete/{id}',[UserController::class,'destroy']);
Route::get('/auth/user', [UserController::class, 'index']);

Route::post('/auth/user/{id}',[UserController::class,'store']);

Route::get('/destinasi', [DestinasiController::class, 'index']);
Route::get('/destinasi/{id}', [DestinasiController::class, 'show']);
Route::post('/destinasi', [DestinasiController::class, 'store']);
Route::post('/destinasi/{id}', [DestinasiController::class, 'update']);
Route::delete('/destinasi/{id}', [DestinasiController::class, 'destroy']);
Route::get('/destinasi', [DestinasiController::class, 'search']);

Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/send', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');

// Route::get('/peta',[PetaController::class,'get']);
// Route::post('/peta',[PetaController::class,'store']);
// Route::post('/peta/{id}',[PetaController::class,'update']);
// Route::delete('/peta/{id}',[PetaController::class,'destroy']);

