<?php
use App\Http\Livewire\DocumentUpload;
use App\Http\Livewire\DocumentList;
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

    // 0. Staff’s Dashboard
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');

    // 1. Patient dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 2. Support / Messaging View
    Route::get('/support', function () {
        return view('support');
    })->name('support');

    // 3. Patient's Tests
    Route::get('/patient/tests', function () {
        return view('patient.tests');
    })->name('patient.tests');

    // 4. Patient's Diagnosis
    Route::get('/patient/diagnosis', function () {
        return view('patient.diagnosis');
    })->name('patient.diagnosis');

    // 5. Patient's Reports
    Route::get('/patient/reports', function () {
        return view('patient.reports');
    })->name('patient.reports');

    // 6. Patient's Documents
    Route::get('/patient/documents', DocumentList::class)
        ->name('patient.documents');

    // Document Upload
    Route::get('/patient/documents/upload', DocumentUpload::class)
        ->name('patient.documents.upload');

    // 7. Patient's Vaccines
    Route::get('/patient/vaccines', function () {
        return view('patient.vaccines');
    })->name('patient.vaccines');

    //  8. Previous Visits
    Route::get('/patient/visits', function () {
        return view('patient.visits');
    })->name('patient.visits');

    //  9. Patient’s Summary
    Route::get('/staff/patient-summary', function () {
        return view('staff.patient-summary');
    });

    // 10. Managing Patients
    Route::get('/staff/patients', function () {
        return view('staff.patients');
    });
});


Route::resource('patient', App\Http\Controllers\PatientController::class)->only('index');

Route::resource('file', App\Http\Controllers\FileController::class)->only('show');

Route::resource('support', App\Http\Controllers\SupportController::class)->except('edit', 'destroy');

Route::resource('support-message', App\Http\Controllers\SupportMessageController::class)->only('index', 'store');

Route::resource('test', App\Http\Controllers\TestController::class)->only('index', 'show');

Route::resource('diagnosis', App\Http\Controllers\DiagnosisController::class)->only('index', 'show');

Route::resource('report', App\Http\Controllers\ReportController::class)->only('index', 'show');

Route::resource('document', App\Http\Controllers\DocumentController::class)->except('edit');

Route::resource('vaccine', App\Http\Controllers\VaccineController::class)->except('edit');

Route::resource('appointment', App\Http\Controllers\AppointmentController::class)->except('edit');

Route::resource('time-slot', App\Http\Controllers\TimeSlotController::class)->only('index', 'update');

Route::resource('doctor-schedule', App\Http\Controllers\DoctorScheduleController::class)->only('index');

Route::resource('visit', App\Http\Controllers\VisitController::class)->only('index', 'show');

Route::resource('announcement', App\Http\Controllers\AnnouncementController::class)->only('index', 'show');

Route::resource('payment-gateway', App\Http\Controllers\PaymentGatewayController::class)->only('index');

Route::resource('invoice', App\Http\Controllers\InvoiceController::class)->only('index', 'show');

Route::resource('transaction', App\Http\Controllers\TransactionController::class)->except('create', 'edit', 'show');

Route::resource('blood-donation-request', App\Http\Controllers\BloodDonationRequestController::class)->except('edit', 'show');
