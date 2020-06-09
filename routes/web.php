<?php

use App\Http\Controllers\BakeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WaffleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/bake', [BakeController::class, 'index'])->name('bake');

Route::middleware('auth')->group(function () {
    Route::apiResource('waffles', WaffleController::class);
});
