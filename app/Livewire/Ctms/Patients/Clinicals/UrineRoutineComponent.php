<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\UrineRoutine;

//forms
use App\Livewire\Forms\Clinicals\FormUrineRoutine;

//traits
use App\Traits\TCtms\TClinicals\TUrineRoutine;

//logs
use Illuminate\Support\Facades\Log;

class UrineRoutineComponent extends Component
{
    use TUrineRoutine;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormUrineRoutine $form_n;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.urine-routine-component');
    }

    public function fnRenalFunction($input)
    {
        $this->input = $this->form_n->all();
        //dd($this->input); // 
        $result = $this->saveUrineRoutineData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Urine Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 
}
