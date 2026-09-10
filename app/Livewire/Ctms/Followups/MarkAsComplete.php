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

    // variables paitent global uuid
    public $enrolledPatients;
    public $patient_uuid;
    public $follow_up = true;
    public $data_type;
    public $status_code = null;

    //Panel openings
    public $p11 = false;

    public $id;
    public $entered_by;

    public $fu_number;

    //row selected
    public $rowSelected;


    public function render()
    {
        $this->entered_by = Auth::user()->name;

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
        $step_val = config('ctms.steps');

        if(in_array($this->fu_number, $this->fu_array))
        {
            if($this->fu_number === "unscheduled")
            {
                $this->data_type = $this->fu_number;
            }else {
                $this->data_type = "follow-up-".$this->fu_number;
            }
            //now get the key value of the step_val array
            $this->status_code = array_search($this->data_type, $step_val); 
            $this->p11 = true;
            //$this->PatientStatusPanel = true;
        }
        else {
            LivewireAlert::title('Select Followup')->warning()->asToast()->show();
        }
    }

    public function fnResetAllVisiblePanels()
    {
        $this->p11 = false;
    }
}
