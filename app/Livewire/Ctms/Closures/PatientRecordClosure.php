<?php

namespace App\Livewire\Ctms\Closures;

use Livewire\Component;

use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;
use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;
//uploads
use Livewire\WithFileUploads;

class PatientRecordClosure extends Component
{

    public $patientInfoButtons = false;

    public $patientClosure;

    //Form openings
    public $panel_primary_info = false;
    public $panel_life_style = false;

    public $p1 = false;
    public $p2 = false;
    public $p3 = false;
    public $p4 = false;
    public $p5 = false;

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
    public $draftPatients;
    public $patient_uuid;
    public $cardTittle;
    public $date_created;
    public $VAScore;

    // important
    public $created_at;
    public $empty_result;

    public $entry="update";

    public $highlightedId = null;

    public $activeTab;


    public function render()
    {
        if( Auth::user()->hasAnyRole(['ctms_incharge']) )
        {
            $status = ['sealed'];
            $this->editQuery($status);
            //$this->draftPatients = Patient::whereIn('status',['draft','verified','approved'])->get();
        }
        if( Auth::user()->hasAnyRole(['director']) )
        {
            $status = ['sealed'];

            $this->editQuery($status);
            //$this->draftPatients = Patient::whereIn('status',['draft','verified','approved','sealed'])->get();
        }

        return view('livewire.ctms.closures.patient-record-closure');
    }

    public function editQuery($status)
    {
        $this->patientClosure = Patient::whereIn('status',$status)->get();
    }

    public function selectedPatient($id)
    {
        //dd($id);
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        $this->patientInfoButtons = true;
        $this->highlightedId = $id;
    }


    public function initiatePatientDataClosure($id)
    {
        //dd($id);
        $this->patient_uuid = $id;
        
        $this->highlightedId = $id;

        //dd($this->patient_uuid);
        $this->closeAllPanels();
        $this->p1 = true;
    }



    public function closeAllPanels()
    {
        $p1 = false;
        $p2 = false;
        $p3 = false;
        $p4 = false;
        $p5 = false;
        /*
        $p6 = false;
        $p7 = false;
        $p8 = false;
        $p9 = false;
        $p10 = false;
        */
    }

}
