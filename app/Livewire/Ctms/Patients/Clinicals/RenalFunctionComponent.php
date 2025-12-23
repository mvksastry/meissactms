<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\RenalFunction;

//forms
use App\Livewire\Forms\Clinicals\FormRenalFunction;

//traits
use App\Traits\TCtms\TClinicals\TRenalFunctions;

//logs
use Illuminate\Support\Facades\Log;

class RenalFunctionComponent extends Component
{
    use TRenalFunctions;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormRenalFunction $form_m;

    public function mount($patient_uuid)
    {
        $this->passObj = RenalFunction::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_m->opd_id = $this->passObj->opd_id;
        $this->form_m->in_patient_id = $this->passObj->in_patient_id;
        $this->form_m->admission_date = $this->passObj->admission_date;
        $this->form_m->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.renal-function-component');
    }

    public function fnRenalFunction()
    {
        $this->input = $this->form_m->all();
        //dd($this->input); // 
        $result = $this->saveRenalFunctionsData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Renal Fn Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 
}
