<?php

namespace App\Livewire\Ctms\Patients\Decision;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms

//traits
use App\Traits\Base;
use Livewire\WithFileUploads;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Logging
use Illuminate\Support\Facades\Log;

class Enrollment extends Component
{
    use Base;
    use WithFileUploads;

    //form status
    public $data_type = null;
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    //new paitent global uuid
    public $patient_uuid, $entry="update", $confirmed_patients, $entered_by;

    //form variables

    //panel definitions
    public $newPatientEntrySteps = false;
    public $newClinicalInvestigationsEntrySteps = false;

    //Form openings
    public $p1 = false;
    public $p2 = false;
    public $p3 = false;
    public $p4 = false;
    public $p5 = false;

    public function render()
    {
        $this->confirmed_patients = Patient::where('status','draft')->get();
        $this->entered_by = Auth::user()->name;
        //dd($this->confirmedPatients);
        return view('livewire.ctms.patients.decision.enrollment');
    }

    public function selectedPatient($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $this->setPatientDetails($this->patient_uuid);
       // dd('selectedPatient', $this->patient_uuid);
    }

    public function setPatientDetails($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $this->resetAllPanels();
        $this->p1 = true;
    }

    public function resetAllPanels()
    {
        $this->p1 = false;
        $this->p2 = false;
        $this->p3 = false;
        $this->p4 = false;
        $this->p5 = false;
    }
}
