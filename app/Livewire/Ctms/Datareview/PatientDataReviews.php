<?php

namespace App\Livewire\Ctms\Datareview;

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


//traits
use App\Traits\TCtms\TCroDashboard;

//logs
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;
//forms

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class PatientDataReviews extends Component
{

    use TCroDashboard;
    use WithFileUploads;
    //default panels
    //default panels
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
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    //state of panel on or off
    public $stateOfNewPatientEntrySteps = "off";

    //Form openings
    public $p1 = false;
    public $p2 = false;
    public $p3 = false;
    public $p4 = false;
    public $p5 = false;
    public $p6 = false;

    public $p7 = false;
    public $p8 = false;
    public $p9 = false;
    public $p10 = false;
    
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

    //modals and callouts.

    //public variable for checking status incomplete status
    public $patient_data_status;

    public $fu_number;
    public $fuselection = false;

    //logged user
    public $logged_user;

    //follow-up value array
    public $fu_array = ['pre-enrollment', 'unscheduled', 1, 2, 3, 4, 5, 'all'];

    //row selected
    public $rowSelected;

    public function render()
    {
        $this->entered_by = Auth::user()->name;
        $this->logged_user = Auth::user()->name;

        /*
        //first get all active patient_uuid from enrollment table
        $enrolled = Enrollment::where('status', 'current')->pluck('patient_uuid')->toArray();
        //now get patient objects parent table, ideall not necessary to as we need only 
        //patient uuid to process. the patient object give opd_id etc..
        $this->enrolledPatients = Patient::whereIn('patient_uuid', $enrolled)->get();
        */

        //for testing comment above 4 lines and use the query below
        $this->enrolledPatients = Patient::where('status', 'sealed')->get();


        //dd($this->enrolledPatients);

        return view('livewire.ctms.datareview.patient-data-reviews');
    }

    public function selectedPatient($id)
    {
        //dd($id);
        $this->patient_uuid = $id;
        $this->patientInfoButtons = true;
        //$this->fuselection = true;
        $this->rowSelected = $id;
        LivewireAlert::title('Now Select Category')->info()->asToast()->show();
    }


    /*
    public function updatedFuNumber()
    {
        if(in_array($this->fu_number, $this->fu_array))
        {
            if($this->fu_number === "pre-enrollment" || $this->fu_number === "unscheduled" || $this->fu_number === 'all')
            {
                $this->data_type = $this->fu_number;
            }else {
                $this->data_type = "follow-up-".$this->fu_number;
            }
            $this->patientInfoButtons = true;
        }
        else {
            LivewireAlert::title('Select Followup')->warning()->asToast()->show();
        }
    }
    */

    #[On('resetPanelsForNewMessages')] 
    public function resetMessagePanels()
    {
        $this->msg_panel = false;
        $this->sys_panel = false;
        
        $this->sysAlertInfo = false;
        $this->sysAlertSuccess = false;
        $this->sysAlertWarning = false;
        $this->sysAlertDanger = false;

        $this->comInfo = false;
        $this->comSuccess = false;
        $this->comDanger = false;
        $this->comWarning = false;
    }

    public function fnShowPrimaryInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p1 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Primary Info Data Review Dashboard');
    }

    public function fnFULifeStyleData($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p2 = true;
        //dd($patient_uuid);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Life Style Follow-up Dashboard');
    }

    public function fnFUClinicalInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p3 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Clinical Invest Dashboard');
        $this->dispatch('renderChart');
    }

    public function fnFUSensoryExamInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p4 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Sensory Exam Dashboard');
    }

    public function fnFUMDTRExamInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p5 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Sensory Exam Dashboard');
    }

    public function fnFUPatientReportUploads($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p6 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Shown File Report Dashboard');
        //dd("image upload reached");
    }

    public function fnFUModifiedPfirmannInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p7 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Pfirmann Dashboard');
    }

    public function fnFUVisualAnalogInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p8 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown VA Score Dashboard');
    }

    public function fnFUMODIQInfo($patient_uuid)
    {
        $this->fnResetAllVisiblePanels();
        $this->p9 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown MODQ Score Dashboard');
    }

    public function fnFURMQInfo($patient_uuid) 
    {
        $this->fnResetAllVisiblePanels();
        $this->p10 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown RMQ Score Dashboard');
    }

    public function fnResetAllVisiblePanels()
    {
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
    }

    //--- UI related code ends here ---//



















}
