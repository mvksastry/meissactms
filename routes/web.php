<?php

use Illuminate\Support\Facades\Route;

// All roles
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventsController;
//use App\Http\Controllers\DownloadController;

//use App\Http\Controllers\RolesController;
//use App\Http\Controllers\UsersController;

//CTMS - Meissa routes
use App\Http\Controllers\Documents\DocumentsController;
use App\Http\Controllers\Documents\CategoriesController;
use App\Http\Controllers\Documents\DocreviewController;

//--- App/Controllers/Ctms folder ----------------------//
use App\Http\Controllers\Ctms\CentersController;
use App\Http\Controllers\Ctms\ClinicsController;
use App\Http\Controllers\Ctms\PatientsController;


use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
//------------------------------------------------------//


// Livewire - Project management
use App\Livewire\General\InternalMessages;


use App\Livewire\Egov\CtmsActivities;
use App\Livewire\Egov\CreateNewActivity;
use App\Livewire\Egov\CtmsActivityArchieves;
use App\Livewire\Egov\EndCtmsActivity;

use App\Livewire\Projects\GoalDivisions;
use App\Livewire\Projects\GoalCategories;
use App\Livewire\Projects\ProjectGoals;
use App\Livewire\Projects\EmployeeAnnualGoals;
use App\Livewire\Projects\GoalProgressLogs;

// Livewire - Patient management
use App\Livewire\Ctms\Datareview\PatientDataReviews;
use App\Livewire\Ctms\Patients\ManagePatients;
use App\Livewire\Ctms\Patients\EditPatients;
use App\Livewire\Ctms\Patients\PatientInformation;
use App\Livewire\Ctms\Followups\PatientFollowup;
use App\Livewire\Ctms\Followups\MarkAsComplete;
use App\Livewire\Ctms\Patients\Decision\PatientEnrollmentProcess;

//Livewire - CRO related routes
use App\Livewire\Cro\CroPatientDashboard;
use App\Livewire\Cro\CroPatientInformation;

// Livewire - Administration related
use App\Livewire\Ctms\Patients\Clinicals\DrugCategories;

// Livewire - Health management


// Livewire - Adverse Events
use App\Livewire\Ctms\Patients\PatientAdverseEvents;

//-- Livewire: Elab related --// 
use App\Livewire\EHub\EhubHome;
use App\Livewire\EHub\ProductionHome;
use App\Livewire\EHub\ActivitiesHome;
use App\Livewire\EHub\BmrChondrocyteProduction;
use App\Livewire\EHub\BmrAuplMeidaProduction;
use App\Livewire\EHub\PassageUpdates;


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

// ------- Livewire: QMS Administration ------- //
use App\Livewire\Qms\NC\NcHome;
//use App\Livewire\Qms\NC\NonConformityIncidences;

use App\Livewire\Qms\CAPA\CapaHome;
//use App\Livewire\Qms\CAPA\CapaIncidences;

use App\Livewire\Qms\RCA\RootCauseHome;
//use App\Livewire\Qms\RCA\RootCauseResolution;

// Livewire - Created for testing individuals -----//
//use App\Livewire\Ctms\TestComponent;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return view('welcome');
});
//original dashboard route killed
Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');
// Global fallback → catch-all for undefined routes
Route::fallback(function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('calendar-events', EventsController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('documents', DocumentsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('docsreview', DocreviewController::class);

    Route::resource('centers', CentersController::class);
    Route::resource('clinics', ClinicsController::class);
    Route::resource('patients', PatientsController::class);
    

    // ------- Livewire: Components All Roles------- //
    Route::get('internal-messages', InternalMessages::class);

    Route::get('ctms-core-activities', CtmsActivities::class);
    Route::get('create_new_activity', CreateNewActivity::class);
    Route::get('end-ctms-activity', EndCtmsActivity::class);
    Route::get('ctms-activity-archieves', CtmsActivityArchieves::class);

    Route::get('goal-divisions', GoalDivisions::class);
    Route::get('goal-categories', GoalCategories::class);
    Route::get('project-goals', ProjectGoals::class);
    Route::get('employee-annual-goals', EmployeeAnnualGoals::class);
    Route::get('update-goal-progress', GoalProgressLogs::class);


    // ------- Livewire: Components All Roles------- //
    Route::get('patient-data-reviews', PatientDataReviews::class);

    // ------- Livewire: Components All Roles------- //
    Route::get('manage-patients', ManagePatients::class);
    Route::get('edit-patients', EditPatients::class)->name('edit-patients');
    Route::get('patient-information', PatientInformation::class);
    Route::get('home-enrollment', PatientEnrollmentProcess::class);
    Route::get('patient-followup', PatientFollowup::class);
    Route::get('mark-as-complete', MarkAsComplete::class);
    Route::get('drug-categories', DrugCategories::class);

    // ------- Livewire: Components CRO Roles------- //
    Route::get('cro-patient-dashboard', CroPatientDashboard::class);
    Route::get('cro-patient-information', CroPatientInformation::class);

    // ------- Livewire: Components All Roles------- //
    Route::get('adverse-events', PatientAdverseEvents::class);


    // ------- Livewire: EHub(ELAb) related Components All Roles------- //
    Route::get('/ehub-home',              App\Livewire\EHub\EhubHome::class);
    Route::get('/production-hub',         App\Livewire\EHub\ProductionHub::class);
    Route::get('/activities-home',        App\Livewire\EHub\ActivitiesHome::class);
    Route::get('/chondrocyte-production', App\Livewire\EHub\BmrChondrocyteProduction::class);
    Route::get('/aupl-media-production',  App\Livewire\EHub\BmrAuplMediaProduction::class);
    Route::get('/passage-updates',         App\Livewire\EHub\PassageUpdates::class);

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

    // ------- Livewire: QMS Administration ------- //

    // ------- Livewire: QMS_NC Administration ------- //
    Route::get('/non-conformity-home', App\Livewire\Qms\NC\NcHome::class);
    //Route::get('/non-conformity-management', App\Livewire\Qms\NC\NonConformityIncidences::class);

    // ------- Livewire: QMS-CAPA Administration ------- //
    Route::get('/capa-home', App\Livewire\Qms\CAPA\CapaHome::class);
    //Route::get('/capa-scrutinites', App\Livewire\Qms\CAPA\CapaIncidences::class);

    // ------- Livewire: QMS-Actions Administration ------- //
    Route::get('/root-cause-home', App\Livewire\Qms\RCA\RcaHome::class);
    //Route::get('/root-cause-resolution', App\Livewire\Qms\RCA\RootCauseResolution::class);

    // ------- Livewire: User Administration ------- //
    Route::resource('ctms-users', UsersController::class);
    Route::resource('user-roles', RolesController::class);
    Route::resource('user-permissions', PermissionsController::class);

    // ------- Livewire: Test Component------- //
    //Route::get('test-component', TestComponent::class);
});

Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles', RoleController::class);
    //Route::resource('users', UserController::class);
    //Route::resource('products', ProductController::class);
});


