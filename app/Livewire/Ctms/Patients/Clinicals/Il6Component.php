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
use App\Livewire\Forms\clinicals\FormIl6;

//traits
use App\Traits\TCtms\TClinicals\TIl6;

//logs
use Illuminate\Support\Facades\Log;

class Il6Component extends Component
{
    use TIl6;

    public $patient_uuid, $passObj, $entry=null;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormIl6 $form_i;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_i->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new Il6();
        }
        else {
            $this->passObj = Il6::where('patient_uuid', $patient_uuid)->first();
            $this->form_a->opd_id = $this->passObj->opd_id;
            $this->form_a->in_patient_id = $this->passObj->in_patient_id;
            $this->form_a->admission_date = $this->passObj->admission_date;
        }
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
        $this->msg_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
