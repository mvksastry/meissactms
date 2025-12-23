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

    public function mount($patient_uuid)
    {
        $this->passObj = UrineRoutine::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_n->opd_id = $this->passObj->opd_id;
        $this->form_n->in_patient_id = $this->passObj->in_patient_id;
        $this->form_n->admission_date = $this->passObj->admission_date;
        $this->form_n->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.urine-routine-component');
    }

    public function fnUrineRoutine()
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
