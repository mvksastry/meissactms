<?php

use Illuminate\Support\Facades\Route;

// All roles
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\DownloadController;

//use App\Http\Controllers\RolesController;
//use App\Http\Controllers\UsersController;

//CTMS - Meissa routes
use App\Http\Controllers\Documents\DocumentsController;
use App\Http\Controllers\Documents\CategoriesController;
use App\Http\Controllers\Documents\DocreviewController;

use App\Http\Controllers\Ctms\CentersController;
use App\Http\Controllers\Ctms\ClinicsController;

use App\Http\Controllers\Ctms\PatientsController;
use App\Http\Controllers\Ctms\EnrollmentsController;
use App\Http\Controllers\Ctms\HealthInformationController;

// Livewire - Patient management
use App\Livewire\Ctms\Patients\ManagePatients;
use App\Livewire\Ctms\Patients\EditPatients;
use App\Livewire\Ctms\Patients\PatientInformation;

// Livewire - Health management
use App\Livewire\Health\ManageHealth;

// Livewire - Adverse Events
use App\Livewire\Ctms\Patients\PatientAdverseEvents;

// Livewire - Created for testing individuals -----//
//use App\Livewire\Ctms\TestComponent;

Route::get('/', function () {
    return view('welcome');
});

//original dashboard route killed
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('documents', DocumentsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('docsreview', DocreviewController::class);


    Route::resource('centers', CentersController::class);
    Route::resource('clinics', ClinicsController::class);
    Route::resource('patients', PatientsController::class);
    Route::resource('enrollments', EnrollmentsController::class);
    Route::resource('health-information', HealthInformationController::class);



    // ------- Livewire: Components All Roles------- //
    Route::get('manage-patients', ManagePatients::class);
    Route::get('edit-patients', EditPatients::class)->name('edit-patients');
    Route::get('patient-information', PatientInformation::class);

    // ------- Livewire: Components All Roles------- //
    Route::get('manage-health', ManageHealth::class);

    // ------- Livewire: Components All Roles------- //
    Route::get('adverse-events', PatientAdverseEvents::class);


    // ------- Livewire: Test Component------- //
    //Route::get('test-component', TestComponent::class);
});

Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles', RoleController::class);
    //Route::resource('users', UserController::class);
    //Route::resource('products', ProductController::class);
});


