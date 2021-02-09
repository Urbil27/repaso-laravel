<?php

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

Route::view('/enunciado', 'enunciado');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/flightpassenger',[App\Http\Controllers\FlightController::class, 'flightPassenger'])->name('flightPassenger');
Route::get('/', [App\Http\Controllers\FlightController::class, 'index']);
Route::post('/reserve',[App\Http\Controllers\FlightController::class, 'reserve']);


