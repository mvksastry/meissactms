<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\Creatinine;

//forms
use App\Livewire\Forms\Clinicals\FormCreatinine;

//traits
use App\Traits\TCtms\TClinicals\TCreatinine;

//logs
use Illuminate\Support\Facades\Log;

class CreatinineComponent extends Component
{
    //traits
    use TCreatinine;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    //models
    public FormCreatinine $form_e;

    public function mount($patient_uuid)
    {
        $this->passObj = Creatinine::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_e->opd_id = $this->passObj->opd_id;
        $this->form_e->in_patient_id = $this->passObj->in_patient_id;
        $this->form_e->admission_date = $this->passObj->admission_date;
        $this->form_e->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.creatinine-component');
    }

    public function fnCreatinine()
    {
        $this->input = $this->form_e->all();
        //dd($this->input); // 
        $result = $this->saveCreatinineData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Creatinine Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
