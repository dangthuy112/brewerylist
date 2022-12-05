<?php

use App\Http\Controllers\Api\BreweryController;
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

// Route::get('breweries', [BreweryController::class, 'index']);
// Route::get('breweries/{id}', [BreweryController::class, 'show']);

Route::get('/breweries', [BreweryController::class, 'index']);
Route::get('/breweries/{id}', [BreweryController::class, 'show']);
Route::delete('/delete_brewery/{id}', [BreweryController::class, 'destroy']);
Route::post('/edit_brewery/{id}', [BreweryController::class, 'update']);
Route::post('/add_brewery', [BreweryController::class, 'store']);
Route::post('/reset_data', [BreweryController::class, 'resetData']);