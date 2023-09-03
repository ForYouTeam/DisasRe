<?php

use App\Http\Controllers\Backoffice\AuthController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [AuthController::class, 'perform'])->name('logout.perform');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'getView'])->name('bo-user');
    Route::get('/flood', [FloodController::class, 'getView'])->name('bo-flood');
    Route::get('/reporter', [ReporterController::class, 'getView'])->name('bo-reporter');
    Route::get('/report-image', [ReportController::class, 'getView'])->name('bo-report-image');
    Route::post('/report', [ReportController::class, 'upsertData'])->name('bo-report-image-store');
    Route::get('/report/detail/{id}', [ReportController::class, 'detailView'])->name('detail-report');
    Route::get('/add', [ReportController::class, 'add'])->name('add-report');
});