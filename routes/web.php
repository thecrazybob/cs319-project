<?php

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('onboarding', [App\Http\Controllers\OnboardingController::class, 'index'])->name('onboarding');
});

Route::middleware(['auth:sanctum', 'verified', 'onboarding.completed'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('patient', App\Http\Controllers\PatientController::class)->only('index');

    Route::resource('file', App\Http\Controllers\FileController::class)->only('show');

    Route::resource('support', App\Http\Controllers\SupportController::class)->except('edit', 'destroy');

    Route::get('support/open/{support}', [App\Http\Controllers\SupportController::class, 'open'])->name('support.open');

    Route::get('support/close/{support}', [App\Http\Controllers\SupportController::class, 'close'])->name('support.close');

    Route::resource('support-message', App\Http\Controllers\SupportMessageController::class)->only('index', 'store');

    Route::resource('test', App\Http\Controllers\TestController::class)->only('index', 'show');

    Route::resource('diagnosis', App\Http\Controllers\DiagnosisController::class)->only('index', 'show');

    Route::resource('report', App\Http\Controllers\ReportController::class)->only('index', 'show');

    Route::resource('document', App\Http\Controllers\DocumentController::class);

    Route::resource('vaccine', App\Http\Controllers\VaccineController::class);

    Route::resource('appointment', App\Http\Controllers\AppointmentController::class);

    Route::resource('time-slot', App\Http\Controllers\TimeSlotController::class)->only('index', 'update');

    Route::resource('doctor-schedule', App\Http\Controllers\DoctorScheduleController::class)->only('index');

    Route::resource('visit', App\Http\Controllers\VisitController::class)->only('index', 'show');

    Route::resource('announcement', App\Http\Controllers\AnnouncementController::class)->only('index', 'show');

    Route::resource('payment-gateway', App\Http\Controllers\PaymentGatewayController::class)->only('index');

    Route::resource('invoice', App\Http\Controllers\InvoiceController::class)->only('index', 'show', 'edit');

    Route::resource('transaction', App\Http\Controllers\TransactionController::class)->except('create', 'edit', 'show');

    Route::resource('blood-donation-request', App\Http\Controllers\BloodDonationRequestController::class)->except('edit', 'show');
});
