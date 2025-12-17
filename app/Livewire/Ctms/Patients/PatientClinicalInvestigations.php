<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientCIForm;

use App\Traits\TCtms\TPatientClinicalData;

use App\Models\Ctms\Patient;

class PatientClinicalInvestigations extends Component
{
    //Trait
    use TPatientClinicalData;

    //global patient uuid
    public $patient_uuid;

    //Form bindings
    public PatientCIForm $form;

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

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
        //dd($newObj, $this->form);
    }

    public function fnSaveClinicalData()
    {
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientCIInformation($this->input);

        //dd($result); // 
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }
}
