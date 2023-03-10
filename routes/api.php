<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CourierShippingOptionController;
use App\Http\Controllers\ShipmentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('/shipments', ShipmentController::class);
    Route::resource('/companies', CompanyController::class);
    Route::resource('/couriers', CourierController::class);
    Route::resource('/shipping_option', CourierShippingOptionController::class);
//});
