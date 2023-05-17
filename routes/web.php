<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** set active side bar */
// function set_active($route) {
//     if (is_array($route)) {
//         return in_array(Request::path('register'), $route) ? 'active' : '';
//     }
//     return Request::path() == $route ? 'active' : '';
// }

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('/');

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('dashboard/page', 'index')->name('dashboard/page');
    
    // Route::get('dashboard/data', 'data')->name('dashboard/data');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/data', [HomeController::class, 'data'])->name('dashboard/data');
});

Auth::routes(['verify' => true]);
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/daftar', [HomeController::class, 'register'])->name('daftar');
Route::post('/register/add', [AuthController::class, 'register'])->name('register/add');
Auth::routes();
Route::get('/verify-view', [HomeController::class, 'verifyview'])->name('verifyview');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/login/add', [AuthController::class, 'login'])->name('loginadd');

