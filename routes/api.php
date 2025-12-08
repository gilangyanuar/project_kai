<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReportController;

Route::post('/login', [AuthController::class, 'APILogin']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/dashboard/jadwal', [DashboardController::class, 'jadwal']);
    Route::post('/auth/change-password', [AuthController::class, 'APIChangePassword']);
    Route::post('/logout', [AuthController::class, 'APILogout']);
    Route::post('/laporan/cek-atau-buat', [ReportController::class, 'cekAtauBuat']);
    Route::post('/laporan/{id}/simpan-data-inventaris', [ReportController::class, 'simpanDataInventaris']);
});