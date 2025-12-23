<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\Il6;

//forms
use App\Livewire\Forms\Clinicals\FormIl6;

//traits
use App\Traits\TCtms\TClinicals\TIl6;

//logs
use Illuminate\Support\Facades\Log;

class Il6Component extends Component
{
    use TIl6;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormIl6 $form_i;
    
    public function render()
    {
        return view('livewire.ctms.patients.clinicals.il6-component');
    }

    public function fnIl6($input)
    {
        $this->input = $this->form_i->all();
        //dd($this->input); // 
        $result = $this->saveIl6Data($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved IL-6 Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
