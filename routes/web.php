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
    return view('welcome');
});

// 0. Staff’s Dashboard
Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
});

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
Route::get('/patient/documents', function () {
    return view('patient.documents');
})->name('patient.documents');

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
