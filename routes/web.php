<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\DeviceController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');

    Route::get('device' ,[DeviceController::class, 'index'])->name('devices');
    Route::get('singleDevice/{deviceID}', [DeviceController::class, 'show'])->name('showDev');
    Route::get('dict', [DeviceController::class, 'visualizeData'])->name('dict');
    Route::get('singleDevice/{deviceID}', [DeviceController::class, 'FirstDev'])->name('singleDev');
    //Route::post('scan', [DeviceController::class, 'scan'])->name('scan');
    //Route::get('singleDevice/{deviceID}', [DeviceController::class, 'getTime'])->name('time');
    
});

