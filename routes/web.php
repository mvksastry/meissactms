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



//-- Livewire: Inventory, Samples and Reagents --//   
use App\Livewire\Inventory\AddInventoryCategory;
use App\Livewire\Inventory\AddToInventory;
use App\Livewire\Inventory\BulkImportInventory;
use App\Livewire\Inventory\ManageInventory;
use App\Livewire\Inventory\ReviewReplinishment;
use App\Livewire\Inventory\UpdateConsumption;
use App\Livewire\Inventory\ReviewConsumption;

use App\Livewire\Samples\ManageSamples;
use App\Livewire\Samples\AddRepository;
use App\Livewire\Samples\AddToSamples;
use App\Livewire\Samples\BulkImportSamples;
use App\Livewire\Samples\ResearchSamples;
use App\Livewire\Samples\UpdateSampleUsage;

use App\Livewire\Reagents\MakeNewReagent;
use App\Livewire\Reagents\ManageReagents;
use App\Livewire\Reagents\RemakeReagent;
use App\Livewire\Reagents\UpdateReagentUsage;

use App\Livewire\General\LogBook;
use App\Livewire\General\ManageTasks;
//use App\Livewire\General\ManageLabfiles;





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


    // ------- Livewire: Components All Roles------- //
    Route::get('/add-inventory-category', App\Livewire\Inventory\AddInventoryCategory::class);
    Route::get('/add-to-inventory',       App\Livewire\Inventory\AddToInventory::class);
    Route::get('/bulk-import-inventory',  App\Livewire\Inventory\BulkImportInventory::class);
    Route::get('/manage-inventory',       App\Livewire\Inventory\ManageInventory::class);
    Route::get('/review-replinishment',   App\Livewire\Inventory\ReviewReplinishment::class);
    Route::get('/update-consumption',     App\Livewire\Inventory\UpdateConsumption::class);
    Route::get('/review-consumption',     App\Livewire\Inventory\ReviewConsumption::class);
    
    
    Route::get('/manage-samples',         App\Livewire\Samples\ManageSamples::class);
    Route::get('/add-repository',         App\Livewire\Samples\AddRepository::class);
    Route::get('/add-to-samples',         App\Livewire\Samples\AddToSamples::class);
    Route::get('/bulk-import-samples',    App\Livewire\Samples\BulkImportSamples::class);
    Route::get('/research-samples',       App\Livewire\Samples\ResearchSamples::class);
    Route::get('/update-sample-usage',    App\Livewire\Samples\UpdateSampleUsage::class);
    
    
    Route::get('/make-new-reagent',      App\Livewire\Reagents\MakeNewReagent::class);
    Route::get('/manage-reagents',       App\Livewire\Reagents\ManageReagents::class);
    Route::get('/remake-reagent',        App\Livewire\Reagents\RemakeReagent::class);
    Route::get('/update-reagent-usage',  App\Livewire\Reagents\UpdateReagentUsage::class);

    Route::get('/log-book',              App\Livewire\General\LogBook::class);
    Route::get('/manage-tasks',          App\Livewire\General\ManageTasks::class);

    //Route::get('/manage-labfiles',       App\Livewire\Documents\ManageLabfiles::class);


    // ------- Livewire: Test Component------- //
    //Route::get('test-component', TestComponent::class);
});

Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles', RoleController::class);
    //Route::resource('users', UserController::class);
    //Route::resource('products', ProductController::class);
});


