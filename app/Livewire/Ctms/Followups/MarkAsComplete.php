<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;

use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//models
use App\Models\Ctms\Decisions\Enrollment;

use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;
use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;

//forms

//traits
use App\Traits\TCtms\TCroDashboard;

//logs
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;
//forms

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class MarkAsComplete extends Component
{

    public $patientInfoButtons = false;

    //form status
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    //new paitent global uuid
    public $patient_uuid, $entry="update";

    //panel definitions
    public $newPatientEntrySteps = false;
    public $newClinicalInvestigationsEntrySteps = false;

    //Errors, Alers, Callouts

    //state of panel on or off
    public $stateOfNewPatientEntrySteps = "off";

    //Form openings
    public $p11 = false;
    public $PatientStatusPanel = false;
    
    //variables
    public $aadhar_id, $pan_num, $other_id, $report_dateope, $dicharge_rep_file;
    public $opd_id, $ipd_id, $admission_date, $form_header;

    //data object variables
    public $id;
    public $patientPrimaryInfo;
    public $ls_infox;
    public $clinical_info;
    public $sensoryexam_info;
    public $mdtre_info;
    public $pfirmangrade_info;
    public $vascore_info;
    public $modq_info;
    public $rmq_replies;

    //common to all
    public $enrolledPatients;

    public $cardTittle;
    public $date_created;
    public $VAScore;

    // important
    public $created_at;
    public $empty_result;

    public $follow_up = true;
    public $data_type;

    //edit route if user wants
    public $edit_button = false;

    //image upload related
    public $image_category = null;
    public $uploadImage = false;
    public $imageInputFile;

    //login credentials
    public $entered_by;

    //modals and callouts.

    //public variable for checking status incomplete status
    public $patient_data_status;

    public $fu_number;
    public $fuselection = false;

    //logged user
    public $logged_user;

    //follow-up value array
    public $fu_array = ['unscheduled', 1, 2, 3, 4, 5];

    //row selected
    public $rowSelected;


    public function render()
    {
        $this->entered_by = Auth::user()->name;
        $this->logged_user = Auth::user()->name;

        
        //first get all active patient_uuid from enrollment table
        $enrolled = Enrollment::where('stage_code', 370)->pluck('patient_uuid')->toArray();
        //now get patient objects parent table, ideall not necessary to as we need only 
        //patient uuid to process. the patient object give opd_id etc..
        $this->enrolledPatients = Patient::whereIn('patient_uuid', $enrolled)->get();
        

        //for testing comment above 4 lines and use the query below
        //$this->enrolledPatients = Patient::where('status', 'draft')->get();


        //dd($enrolled, $this->enrolledPatients);
        return view('livewire.ctms.followups.mark-as-complete');
    }

    public function selectedPatient($id)
    {
        //dd($id);
        $this->patient_uuid = $id;
        $this->fuselection = true;
        $this->rowSelected = $id;
        LivewireAlert::title('Now Select Data Type')->info()->asToast()->show();
    }

    public function updatedFuNumber()
    {
        if(in_array($this->fu_number, $this->fu_array))
        {
            
            
            if($this->fu_number === "unscheduled")
            {
                $this->data_type = $this->fu_number;
            }else {
                $this->data_type = "follow-up-".$this->fu_number;
            }
            //$this->patientInfoButtons = true;
            //$this->fixDataTypeForEntry();
            $this->p11 = true;
            $this->PatientStatusPanel = true;
            
        }
        else {
            LivewireAlert::title('Select Followup')->warning()->asToast()->show();
        }
    }

    public function fixDataTypeForEntry()
    {
        //first check if status of patient in patients table.
        // if the status is not sealed, the data type is "pre-enrollment"
        // if the data type is sealed then it must belong to follow-up 1 to 5 or extra-ordinary
        // no entries in patients table as no columns present for modification.
        //
        // determine date of surgery and count number of days where window opens
        // check whether entries for that window like Follow-up-1 or any such entries present
        // if such entries present then that particular follow-up done.
        // increment the follow-up number and show that window meaning that radio button.
        // this is the simplest logic
        // how to implement logic
        // $steps = [   
        //              "step-1" => 'pre-enrollment', 
        //              "step-2" => 'follow-up-1', 
        //              "step-3" => 'follow-up-2', 
        //              "step-4" => 'follow-up-3', 
        //              "step-5" => 'follow-up-4', 
        //              "step-6" => 'follow-up-5', 
        //              "step-7" => "extra"
        // ];
        //
        /////////////////////////////////////////////
        $patient = Patient::where('patient_uuid', $this->patient_uuid)->first();

        $status_code = $patient->status_code;

        
        $status_code = 160;
        //assume that this is the array came back from db.
        $steps = [   
                      "10" => 'pre-enrollment', 
                      "20" => 'follow-up-1', 
                      "30" => 'follow-up-2', 
                      "40" => 'follow-up-3', 
                      "50" => 'follow-up-4', 
                      "60" => 'follow-up-5', 
                      "70" => "extra"
        ];

        $current_step = $steps[$status_code];
        $key = array_search($this->data_type,$steps, true);
        //dd($status_code, $current_step, $this->data_type);
        if($current_step == $key)
        {
            LivewireAlert::title('reached step to perform this operation')->success()->show();

        }else{
            LivewireAlert::title('currently at step [ '.$current_step.' ]not reached step [ '.$key.' ] to perform this operation')->warning()->show();
        }



    }

    public function fnResetAllVisiblePanels()
    {
        /*
        $this->p1 = false;
        $this->p2 = false;
        $this->p3 = false;
        $this->p4 = false;
        $this->p5 = false;
        $this->p6 = false;
        $this->p7 = false;
        $this->p8 = false;
        $this->p9 = false;
        $this->p10 = false;
        */
        $this->p11 = false;
    }
}
