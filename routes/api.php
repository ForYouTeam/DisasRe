<?php

use App\Http\Controllers\Backoffice\FloodController;
use App\Http\Controllers\Backoffice\ReportController;
use App\Http\Controllers\Backoffice\ReporterController;
use App\Http\Controllers\Backoffice\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/users')->controller(UserController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
});

Route::prefix('v1/flood')->controller(FloodController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
});

Route::prefix('v1/reporter')->controller(ReporterController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
});

Route::prefix('v1/report')->controller(ReportController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
});
