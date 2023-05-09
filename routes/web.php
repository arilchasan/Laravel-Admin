<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
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
//         return in_array(Request::path(), $route) ? 'active' : '';
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

