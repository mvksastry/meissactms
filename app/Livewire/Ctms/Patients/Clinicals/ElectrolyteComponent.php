<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\Electrolytes;

//forms
use App\Livewire\Forms\Clinicals\FormElectrolytes;

//traits
use App\Traits\TCtms\TClinicals\TElectrolytes;

//logs
use Illuminate\Support\Facades\Log;

class ElectrolyteComponent extends Component
{
    use TElectrolytes;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormElectrolytes $form_g;
    
    public function render()
    {
        return view('livewire.ctms.patients.clinicals.electrolyte-component');
    }

    public function fnElectrolytes($input)
    {
        $this->input = $this->form_g->all();
        //dd($this->input); // 
        $result = $this->saveElectrolyteData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Electrolytes Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
