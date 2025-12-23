<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\Crp;

//forms
use App\Livewire\Forms\Clinicals\FormCrp;

//traits
use App\Traits\TCtms\TClinicals\TCrp;

//logs
use Illuminate\Support\Facades\Log;

class CrpComponent extends Component
{
    use TCrp;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormCrp $form_f;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.crp-component');
    }

    public function fnCRP($input)
    {
        $this->input = $this->form_f->all();
        //dd($this->input); // 
        $result = $this->saveCrpData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved CRP Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
