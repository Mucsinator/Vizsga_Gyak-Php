<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Models\Car;
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

Route::get('/rentals', [RentalController::class, 'index']);
Route::get('/rentals/{date}', [RentalController::class, 'rentalsAfterDate']);
Route::post('/rentals', [RentalController::class, 'store']);

Route::apiResource('cars', CarController::class);
