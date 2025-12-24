<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\clinicals\Electrolytes;

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
   
    public function mount($patient_uuid)
    {
        $this->passObj = Electrolytes::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_g->opd_id = $this->passObj->opd_id;
        $this->form_g->in_patient_id = $this->passObj->in_patient_id;
        $this->form_g->admission_date = $this->passObj->admission_date;
        $this->form_g->entered_by = Auth::user()->name;
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
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
