<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\RentersController;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tests\Feature\RentApiTest;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// CARS API

    // GET ALL
    Route::get('/cars', [CarsController::class, 'index']);

    // ADD NEW 

    Route::post('/cars', [CarsController::class, 'store']);


    // UPDATE

    Route::put('/cars/{id}', [CarsController::class, 'update']);



// RENTERS API


    // GET ALL
    Route::get('/renters', [RentersController::class, 'index']);

    // ADD NEW 

    Route::post('/renters', [RentersController::class, 'store']);


    // UPDATE

    Route::put('/renters/{id}', [RentersController::class, 'update']);









