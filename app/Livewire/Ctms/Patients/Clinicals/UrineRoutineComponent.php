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
use App\Livewire\Forms\clinicals\FormUrineRoutine;

//traits
use App\Traits\TCtms\TClinicals\TUrineRoutine;

//logs
use Illuminate\Support\Facades\Log;

class UrineRoutineComponent extends Component
{
    use TUrineRoutine;

    public $patient_uuid, $passObj, $entry=null;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormUrineRoutine $form_n;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_n->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new UrineRoutine();
        }
        else {
            $this->passObj = UrineRoutine::where('patient_uuid', $patient_uuid)->first();
            $this->form_a->opd_id = $this->passObj->opd_id;
            $this->form_a->in_patient_id = $this->passObj->in_patient_id;
            $this->form_a->admission_date = $this->passObj->admission_date;
        }
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
        $this->msg_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 
}
