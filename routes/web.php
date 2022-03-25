<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\systemController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::get('/', [homeController::class, "index"]);
    Route::get('/logout', [authController::class, "logout"]);
    Route::get('/obat', [homeController::class, "obat"]);
    Route::post("/", [systemController::class, "index"]);
    Route::post("/racikan", [systemController::class, "obatRacikan"]);
    Route::get("/racikan", [homeController::class, "obat_racikan"]);
    Route::get("/pencarian", [systemController::class, "ajax"]);
});

Route::middleware("guest")->group(function () {
    Route::get("/login", [authController::class, "index"])->name("login");
    Route::post("/login", [authController::class, "handle_login"]);
    Route::get("/daftar", [authController::class, "join"]);
    Route::post("/daftar", [authController::class, "handle_daftar"]);
});
