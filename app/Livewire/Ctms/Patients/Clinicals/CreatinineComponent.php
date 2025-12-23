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

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.creatinine-component');
    }

    public function fnCreatinine($input)
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
