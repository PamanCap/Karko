<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\FuelLogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {

    return redirect()
        ->route('login');
});

// routes role admin
Route::middleware([
    'auth',
    'role:admin'
])->prefix('admin')->group(function () {
    Route::resource(
        'bookings',
        BookingController::class
    );
    Route::resource(
        'vehicles',
        VehicleController::class
    );
    Route::resource(
        'drivers',
        DriverController::class
    );
    Route::patch(
        '/bookings/{booking}/complete',
        [BookingController::class, 'complete']
    )->name('bookings.complete');
    Route::resource(
        'fuel-logs',
        FuelLogController::class
    );
    Route::resource(
        'services',
        ServiceController::class
    );
    Route::patch(
        '/services/{service}/complete',
        [ServiceController::class, 'complete']
    )->name('services.complete');
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/reports/bookings', [ReportController::class, 'bookingReport'])->name('reports.bookings');
});


// routes role approver
Route::middleware([
    'auth',
    'role:approver'
])->prefix('approver')->group(function () {
    Route::get(
        '/dashboard',
        [
            DashboardController::class,
            'index'
        ]
    )
        ->name('approver.dashboard');
    Route::get(
        '/approvals',
        [ApprovalController::class, 'index']
    )
        ->name('approvals.index');
    Route::patch(
        '/approvals/{approval}/approve',
        [ApprovalController::class, 'approve']
    )
        ->name('approvals.approve');

    Route::patch(
        '/approvals/{approval}/reject',
        [ApprovalController::class, 'reject']
    )
        ->name('approvals.reject');
});

require __DIR__ . '/auth.php';
