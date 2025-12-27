<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\GeneralSummary;

//forms
use App\Livewire\Forms\clinicals\FormGeneralSummary;

//traits
use App\Traits\TCtms\TClinicals\TGeneralSummary;

//logs
use Illuminate\Support\Facades\Log;

class GeneralSummaryComponent extends Component
{
    use TGeneralSummary;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormGeneralSummary $form_h;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_h->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new GeneralSummary();
        }
        else {
            $this->passObj = GeneralSummary::where('patient_uuid', $patient_uuid)->first();
            $this->form_a->opd_id = $this->passObj->opd_id;
            $this->form_a->in_patient_id = $this->passObj->in_patient_id;
            $this->form_a->admission_date = $this->passObj->admission_date;
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.general-summary-component');
    }

    public function fnGeneralSummary()
    {
        $this->input = $this->form_h->all();
        //dd($this->input); // 
        $result = $this->saveGenSummaryData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Gen Summary Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
