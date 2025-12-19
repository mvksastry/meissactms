<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PatientSEForm;

//traits
use App\Traits\TCtms\TPatientSEData;

//logs
use Illuminate\Support\Facades\Log;

class SensoryExamination extends Component
{
    use TPatientSEData;

    //global patient uuid
    public $patient_uuid;
    
    //Form bindings
    public PatientSEForm $form;

    //SE Entry scores
    public $S1;
    //public $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $s10;
    //public $t08, $t09, $t10, $t11, $t12;
    public $L1, $L2, $L3, $L4, $L5;
    
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
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientSEInformation($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Sensory Exam data');
        //dd($result); //
    }



}
