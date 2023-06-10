<?php

use App\Models\Destinasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\WishlistController;


use App\Http\Controllers\VerificationController;


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
    
    // Route::get('dashboard/data', 'data')->name('dashboard/data');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/page', [HomeController::class, 'index'])->name('dashboard/page');
    //prefix destinasi
    Route::prefix('/destinasi')->group(function () {
        Route::get('/all', [DestinasiController::class, 'all']);
        Route::get('/detail/{id}', [DestinasiController::class, 'detail']);
        Route::get('/create', [DestinasiController::class, 'create']);
        Route::get('/edit/{id}', [DestinasiController::class, 'edit']);
        Route::post('/add', [DestinasiController::class, 'store']);
        Route::post('/update/{id}', [DestinasiController::class, 'update']);
        Route::delete('/destroy/{id}', [DestinasiController::class, 'destroy']);
    });
    Route::prefix('/kuliner')->group(function(){
        Route::get('/all', [KulinerController::class, 'all']);
        Route::get('create', [KulinerController::class, 'create']);
        Route::post('/add', [KulinerController::class, 'store']);
        Route::get('/detail/{id}', [KulinerController::class, 'detail']);
        Route::delete('/destroy/{id}', [KulinerController::class, 'destroy']);
        Route::get('/edit/{id}', [KulinerController::class, 'edit']);
        Route::post('/update/{id}', [KulinerController::class, 'update']);

        
    });
    Route::prefix('/wishlist')->group(function () {
        Route::get('/all', [WishlistController::class, 'all']);
        Route::get('/add/{destinasi}', [WishlistController::class, 'addToWishlist']);
        Route::get('/remove/{destinasi}', [WishlistController::class, 'removeFromWishlist']);
    });

    //prefix peta
    // Route::prefix('/peta')->group(function () {
    //     Route::get('/all', [PetaController::class, 'index']);
    //     Route::get('/detail/{id}', [PetaController::class, 'show']);
    //     Route::get('/create', [PetaController::class, 'create']);
    //     Route::get('/edit/{id}', [PetaController::class, 'edit']);
    //     Route::post('/add', [PetaController::class, 'store']);
    //     Route::post('/update/{id}', [PetaController::class, 'update']);
    //     Route::delete('/destroy/{id}', [PetaController::class, 'destroy']);
    // });

    //prefix userlogin
    Route::prefix('/userlogin')->group( function(){
        Route::get('/all', [UserController::class, 'userall']);
        Route::delete('/destroy/{id}', [UserController::class, 'destroy']);
    });
});



Auth::routes(['verify' => true]);
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/daftar', [HomeController::class, 'register'])->name('daftar');
Route::post('/daftar/add', [AuthController::class, 'register'])->name('daftar/add');
Auth::routes();
Route::get('/verify-view', [HomeController::class, 'verifyview'])->name('verifyview');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/login/add', [AuthController::class, 'login'])->name('loginadd');


