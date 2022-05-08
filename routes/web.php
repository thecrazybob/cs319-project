<?php

use App\Http\Livewire\Form;
use Illuminate\Support\Facades\Route;
use App\Models\Patient;

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

//Route::get('/reg', function () {
//    return view('register');
//});
//Route::view('/form', 'form');
// Temporary: for testing purpose

Route::get('/', function () {
    return view('patients', [
        'patient' => Patient::all()
    ]);
});

Route::get('patients/{patient}', function ($id) {
    return view('patient', [
        'patient' => Patient::findOrFail($id)
    ]);
});


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
