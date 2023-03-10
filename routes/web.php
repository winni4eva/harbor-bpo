<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/companies', function () {
        return Inertia::render('Companies');
    })->name('companies'); 

    Route::get('/couriers', function () {
        return Inertia::render('Couriers');
    })->name('couriers');

    Route::get('/shipping_option', function () {
        return Inertia::render('ShippingOption');
    })->name('shipping_option');

    Route::get('/shipment', function () {
        return Inertia::render('Shipment');
    })->name('shipment');

    Route::get('/reports', function () {
        return Inertia::render('Report');
    })->name('reports');
});
