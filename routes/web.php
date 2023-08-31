<?php

use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\FloodController;
use App\Http\Controllers\Backoffice\ReportController;
use App\Http\Controllers\Backoffice\ReporterController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\web\HomeController;
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

Route::get('', [DashboardController::class, 'index'])->name('test');
Route::get('/user', [UserController::class, 'getView'])->name('bo-user');
Route::get('/flood', [FloodController::class, 'getView'])->name('bo-flood');
Route::get('/reporter', [ReporterController::class, 'getView'])->name('bo-reporter');
Route::get('/report-image', [ReportController::class, 'getView'])->name('bo-report-image');
Route::post('/report', [ReportController::class, 'upsertData'])->name('bo-report-image-store');
Route::get('/detail', [ReportController::class, 'detailView'])->name('detail-report');

Route::get('/home', [HomeController::class, 'index'])->name('home');


