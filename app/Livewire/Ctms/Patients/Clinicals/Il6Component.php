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

    public function mount($patient_uuid)
    {
        $this->passObj = Il6::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_i->opd_id = $this->passObj->opd_id;
        $this->form_i->in_patient_id = $this->passObj->in_patient_id;
        $this->form_i->admission_date = $this->passObj->admission_date;
        $this->form_i->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.il6-component');
    }

    public function fnIl6()
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
