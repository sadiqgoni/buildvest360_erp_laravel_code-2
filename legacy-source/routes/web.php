<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\ClientPortalController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('clients', ClientController::class);
Route::resource('projects', ProjectController::class);
Route::resource('measurements', MeasurementController::class);
Route::resource('materials', MaterialController::class);
Route::resource('investments', InvestmentController::class);
Route::resource('payments', PaymentController::class);

Route::get('finance', [FinanceController::class, 'index'])->name('finance.index');

Route::get('procurement', [ProcurementController::class, 'index'])->name('procurement.index');
Route::get('procurement/create', [ProcurementController::class, 'create'])->name('procurement.create');
Route::post('procurement', [ProcurementController::class, 'store'])->name('procurement.store');

Route::get('legal', [LegalController::class, 'index'])->name('legal.index');
Route::get('legal/create', [LegalController::class, 'create'])->name('legal.create');
Route::post('legal', [LegalController::class, 'store'])->name('legal.store');

Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit_logs.index');

Route::post('investments/{investment}/approve-profit', [InvestmentController::class, 'approveProfit'])->name('investments.approve_profit');
Route::post('investments/{investment}/counter-profit', [InvestmentController::class, 'counterProfit'])->name('investments.counter_profit');
Route::post('investments/{investment}/reject-profit', [InvestmentController::class, 'rejectProfit'])->name('investments.reject_profit');

Route::get('client-portal/{client}', [ClientPortalController::class, 'show'])->name('client_portal.show');
