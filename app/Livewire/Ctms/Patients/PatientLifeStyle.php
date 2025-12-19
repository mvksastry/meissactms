<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;

//forms
use App\Livewire\Forms\PatientLSForm;

//traits-facades
use App\Traits\TCtms\TPatientLifeStyle;
use Livewire\WithFileUploads;

//logs
use Illuminate\Support\Facades\Log;

class PatientLifeStyle extends Component
{
    //Trait binding
    use TPatientLifeStyle;
    //Form bindings
    public PatientLSForm $form;
    //global patient uuid
    public $patient_uuid;
    //data binding
    public $input;

    public $form_header;

    //form variables
    public $opd_id, $in_patient_id, $admission_date;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = null, $sysAlertWarning = null, $sysAlertInfo = null, $sysAlertDanger = null;
    public $comDanger = null, $comWarning = null, $comInfo = null, $comSuccess = null;

    public $cross_leg_sitting, $standing, $sitting, $ls3, $ls4, $ls5, $ls6, $life_style_description;

    public $newObj;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;

        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSavePatientLSInfo()
    {
        $this->input = $this->form->all();
        //dd($this->input); 
        $result = $this->savePatientLSInformation($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved life style data');
    }

}
