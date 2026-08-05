<?php

namespace App\Livewire\Egov;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activity;
use App\Models\Ctms\Patient;
use App\Models\User;
use App\Models\Ctms\Decisions\Enrollment;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TCtms\TActivityQueries;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Validator;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Validation of product form
use App\Livewire\Forms\Activities\CreateActivityForm;

class CreateNewActivity extends Component
{
    //form bindings
    public CreateActivityForm $form;

    public $message = null;

    public $patient_uuid, $property, $field, $enrolmsg, $enrollStatus = false, $enrollment_id = null;

    //panels/forms
    public $viewCreateActivityForm = false;

    //form variables
    public $allActivities = [], $users, $patients;

    public function render()
    {
        $this->users = User::all();
        $this->patients = Patient::pluck('name','patient_uuid')->toArray();
        return view('livewire.egov.create-new-activity');
    }

    public function updated($patient_uuid, $value)
    {
        //LivewireAlert::title('patient Id selected [ '.$value.' ]')->info()->show();
        //this means the activity is related patient and check for enrollment
        $checkE = Enrollment::where('patient_uuid', $value)
                                        ->where('enrollment_decision', 'yes')
                                        ->first();
        if(!$checkE)
        {
            LivewireAlert::title('Patient Not Enrolled')->info()->show();
            //$this->patient_uuid = $patient_uuid;
        }else {
            $this->enrolmsg = true;
            $this->enrollment_id = $checkE->enrollment_id;
            $this->enrollStatus = true;
        } 
    }

    public function fnPostCreateActivityInfo()
    {
        //dd("reached");
       
        //LivewireAlert::title('Processing...')->info()->asToast()->show();
        $this->validate();
        $input = $this->form->all();
        // dd($input);
        //set status and status dates
        $input['status'] = 'active';
        $input['status_date'] = date('Y-m-d');
        $input['entered_by'] = Auth::user()->name;
        $input['entry_date'] = date('Y-m-d');
        //dd($input);
        //before creating entry, check whether patient_id has a row with value enrollment status yes
        //if yes, make entry of enrollment id in the activity table. This is correct and important.
        if(array_key_exists('patient_uuid', $input))
        {
            //this means the activity is related patient and check for enrollment
            if($this->enrollStatus)
            {
                //the activity is patient is also enrolled
                //now the query below checks whether that patients enrollment id 
                // is in the activity table or not.
                // if not update activity table. if enrollment_id present ignore.
                $resx = Activity::where('patient_uuid', $input['patient_uuid'])
                                    ->where('enrollment_id', $this->enrollment_id)
                                    ->first();
                if(!$resx){
                    $input['enrollment_id'] = $this->enrollment_id;
                    $result = Activity::where('patient_uuid', $input['patient_uuid'])->update($input);
                }

            }else {
                //patient linked activity but not enrolled, enrollment_id will be null.
                $result = Activity::create($input);
            }
        } else {
            //this means the activity is not related to patient.
            $result = Activity::create($input);
        }

        if($result)
        {
            LivewireAlert::title('Activity Created')->success()->asToast()->show();
            $msg = 'User ['.Auth::user()->name.'] saved New Activity Data';
            $this->form->reset();
            $input = null;
            Log::channel('patient')->info($msg);
            return $this->redirect('/ctms-core-activities');
        } else {
            LivewireAlert::title('Activity NOT Created')->warning()->asToast()->show();
            $msg = 'User ['.Auth::user()->name.'] Could not save New Activity Data';
            
        } 
        
    }



}
