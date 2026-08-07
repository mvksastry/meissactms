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
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TGeneralSummary;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class GeneralSummaryComponent extends Component
{
    use Base;
    use TGeneralSummary;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormGeneralSummary $form_h;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
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
            $this->setData();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.general-summary-component');
    }

    public function fnGeneralSummary()
    {
        $this->form_h->validate();
        $this->input = $this->form_h->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        $result = $this->saveGenSummaryData($this->input, $this->passObj);
        LivewireAlert::title('General Summary Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Gen Summary Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
       // $this->msg_panel = true;
       // $sysAlertWarning = false;
       // $this->comSuccess = $msg;
    }

    public function setData()
    {
        $this->passObj = GeneralSummary::where('patient_uuid', $this->patient_uuid)
                                        ->where('data_type', $this->data_type)
                                        ->first();
        $this->form_h->opd_id = $this->passObj->opd_id;
        $this->form_h->in_patient_id = $this->passObj->in_patient_id;
        $this->form_h->admission_date = $this->passObj->admission_date;

        $this->form_h->general_summary = $this->passObj->general_summary;

        $this->form_h->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_h->entered_by = $this->passObj->entered_by;
        $this->form_h->entry_date = $this->passObj->entry_date;
    }
}
