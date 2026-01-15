<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PatientCIForm;

//traits
use App\Traits\TCtms\TPatientClinicalData;

//logs
use Illuminate\Support\Facades\Log;

class PatientClinicalInvestigations extends Component
{
    //Trait
    use TPatientClinicalData;

    //Form bindings
    public PatientCIForm $form;

    //global patient uuid
    public $patient_uuid, $entry="";

    public $discharge_report, $discharge_report_file;

    //Biochemical investigations
    public $admission_date, $in_patient_id;
    public $oande, $pr, $temperature, $bp_systolic, $bp_diastolic, $cvs, $panda, $cns;
    public $cbc, $esr, $crp, $rft, $lft, $clotting_time, $bleeding_time, $prothrombin_time, $procalcitonin, $lab_report_file;

    //Common to all panels;
    public $entered_by, $entry_date, $verified_by, $verified_date, $entry_sealed_by, $entry_sealed_date;

    //public function render()
    //{
     //   return view('livewire.ctms.patients.patient-clinical-investigations');
    //}
    //logged user
    public $logged_user, $passObj;

    public function mount($patient_uuid, $entry)
    {
        //dd($patient_uuid, $entry);
        $this->patient_uuid = $patient_uuid;
        $passObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $passObj->opd_id;
        $this->form->in_patient_id = $passObj->in_patient_id;
        $this->form->admission_date = $passObj->admission_date;
        $this->form->entered_by = $passObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
        //dd($passObj, $this->form);
    }

    public function loadFormData()
    {

    }
    
    public function fnSaveClinicalData()
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientCIInformation($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Clinical Data for patient ['.$this->patient_uuid.']');
        //dd($result); //
    }
}
