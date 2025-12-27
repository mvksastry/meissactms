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
use App\Livewire\Forms\clinicals\FormElectrolytes;

//traits
use App\Traits\TCtms\TClinicals\TElectrolytes;

//logs
use Illuminate\Support\Facades\Log;

class ElectrolyteComponent extends Component
{
    use TElectrolytes;

    public $patient_uuid, $passObj, $entry=null;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormElectrolytes $form_g;
   
    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_g->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new Electrolytes();
        }
        else {
            $this->passObj = Electrolytes::where('patient_uuid', $patient_uuid)->first();
            $this->form_a->opd_id = $this->passObj->opd_id;
            $this->form_a->in_patient_id = $this->passObj->in_patient_id;
            $this->form_a->admission_date = $this->passObj->admission_date;
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.electrolyte-component');
    }

    public function fnElectrolytes()
    {
        $this->input = $this->form_g->all();
        //dd($this->input); // 
        $result = $this->saveElectrolyteData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Electrolytes Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->msg_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
