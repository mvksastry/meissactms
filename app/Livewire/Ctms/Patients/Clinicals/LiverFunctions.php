<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\LiverFunction;

//forms
use App\Livewire\Forms\Clinicals\FormLiverFunction;

//traits
use App\Traits\TCtms\TClinicals\TLiverFunctions;

//logs
use Illuminate\Support\Facades\Log;

class LiverFunctions extends Component
{
    use TLiverFunctions;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormLiverFunction $form_k;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.liver-functions');
    }

    public function fnLiverFunction($input)
    {
        $this->input = $this->form_k->all();
        //dd($this->input); // 
        $result = $this->saveLiverFunctionData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Liv function Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 
}
