<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\BloodRoutine;

//forms
use App\Livewire\Forms\clinicals\FormBloodRoutine;

//traits
use App\Traits\TCtms\TClinicals\TBloodRoutine;

//logs
use Illuminate\Support\Facades\Log;

class BloodRoutineComponent extends Component
{
    //traits
    use TBloodRoutine;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    //form binding
    public FormBloodRoutine $form_a;

    public function mount($patient_uuid)
    {
        $this->passObj = BloodRoutine::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_a->opd_id = $this->passObj->opd_id;
        $this->form_a->in_patient_id = $this->passObj->in_patient_id;
        $this->form_a->admission_date = $this->passObj->admission_date;
        $this->form_a->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.blood-routine-component');
    }

    public function fnBloodRoutine()
    {
        //dd("reached");
        $this->input = $this->form_a->all();
        //dd($this->patient_uuid, $this->form_a->opd_id, $this->input); // 
        $result = $this->saveBloodRoutineData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Blood Routine Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    
}
