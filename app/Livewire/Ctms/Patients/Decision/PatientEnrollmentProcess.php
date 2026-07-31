<?php

namespace App\Livewire\Ctms\Patients\Decision;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;
//forms

//traits
use App\Traits\Base;
use Livewire\WithFileUploads;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Logging
use Illuminate\Support\Facades\Log;

class PatientEnrollmentProcess extends Component
{
    use Base;
    use WithFileUploads;

    //form status
    public $data_type = null;
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    //new paitent global uuid
    public $patient_uuid, $opd_id, $entry="update", $confirmed_patients, $entered_by;

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
        $this->confirmed_patients = Patient::where('status','sealed')->get();
        $this->entered_by = Auth::user()->name;
        //dd($this->confirmedPatients);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Enrollment Decision home page');
        return view('livewire.ctms.patients.decision.patient-enrollment-process');
    }

    public function selectedPatient($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $objPatient = Patient::where('patient_uuid', $patient_uuid)->first();
        $this->setPanels();
       // dd('selectedPatient', $this->patient_uuid);
    }

    public function setPanels()
    {        
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

    /*
    private function enrollmentInsertQuery($patient_uuid, $opd_id)
    {
        $result = Enrollment::where('patient_uuid', $patient_uuid)->first();

        if($result)
        {
            return $result;
        }else {
            $result = Enrollment::insert(['patient_uuid'=>$patient_uuid, "opd_id"=>$opd_id]);
            return $result;
        }
    }
    */
}
