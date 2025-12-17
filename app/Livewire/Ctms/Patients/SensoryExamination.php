<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientSEForm;

use App\Traits\TCtms\TPatientSEData;
use App\Models\Ctms\Patient;

class SensoryExamination extends Component
{
    use TPatientSEData;

    //global patient uuid
    public $patient_uuid;
    
    //Form bindings
    public PatientSEForm $form;

    //SE Entry scores
    public $s1;
    //public $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $s10;
    //public $t08, $t09, $t10, $t11, $t12;
    public $l1, $l2, $l3, $l4, $l5;

    

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSaveSensoryExaminationData()
    {
        //dd("reached");
        //$this->message_panel = true;
        //$this->sysAlertSuccess = "Great working";
        //$this->comSuccess = "Great working!";

        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientSEInformation($this->input);

        //dd($result); // 
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Sensory Data Entered";
    }



}
