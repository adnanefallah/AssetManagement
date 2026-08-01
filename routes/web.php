<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\AssetAssignmentController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetHistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Activity Logs
    |--------------------------------------------------------------------------
    */

    Route::get('/activity-logs', [ActivityLogController::class, 'index'])
        ->name('activity-logs.index');

    /*
    |--------------------------------------------------------------------------
    | Asset History
    |--------------------------------------------------------------------------
    */

    Route::get('/assets/{asset}/history', [AssetHistoryController::class, 'index'])
        ->name('assets.history');

    /*
    |--------------------------------------------------------------------------
    | Asset QR Code
    |--------------------------------------------------------------------------
    */

    Route::get('/assets/{asset}/qr', [AssetController::class, 'qrCode'])
        ->name('assets.qrcode');

    /*
    |--------------------------------------------------------------------------
    | Asset Export
    |--------------------------------------------------------------------------
    */

    Route::get('/assets/pdf', [AssetController::class, 'exportPdf'])
        ->name('assets.pdf');

    Route::get('/assets/excel', [AssetController::class, 'exportExcel'])
        ->name('assets.excel');

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    */

    Route::resource('assets', AssetController::class);
    Route::resource('asset-assignments', AssetAssignmentController::class);
    Route::resource('maintenances', MaintenanceController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('departments', DepartmentController::class);

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
