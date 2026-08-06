<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Assignments\AssetAssignmentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Inventory\AssetController;
use App\Http\Controllers\Inventory\CategoryController;
use App\Http\Controllers\Inventory\DepartmentController;
use App\Http\Controllers\Inventory\SupplierController;
use App\Http\Controllers\Logs\ActivityLogController;
use App\Http\Controllers\Logs\AssetHistoryController;
use App\Http\Controllers\Maintenance\MaintenanceController;
use App\Http\Controllers\Maintenance\TicketController;
use App\Http\Controllers\Settings\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Language Switch
|--------------------------------------------------------------------------
*/

Route::get('/lang/{locale}', function ($locale) {

    if (in_array($locale, ['en', 'fr'])) {
        Session::put('locale', $locale);
    }

    return back();

})->name('language');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

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
    | Users
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Administrator')->group(function () {

        Route::resource('users', UserController::class);

    });

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

require __DIR__.'/auth.php';
