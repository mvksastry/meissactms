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
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TIl6;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class Il6Component extends Component
{
    use Base;
    use TIl6;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormIl6 $form_i;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
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
            $this->setData();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.il6-component');
    }

    public function fnIl6()
    {
        $this->form_i->validate();
        $this->input = $this->form_i->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        if($this->input['il6'] == null)
        {
            LivewireAlert::title('IL-6 Data Empty...')->warning()->show();
        }else {
            $result = $this->saveIl6Data($this->input, $this->passObj);
            LivewireAlert::title('IL-6 Data Saved...')->success()->asToast()->show();
            $msg = 'User ['.Auth::user()->name.'] saved IL-6 Data ['.$this->patient_uuid.']';
            Log::channel('patient')->info($msg);
            $this->setData();
        }
    }

    public function setData()
    {
        $this->passObj = Il6::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->data_type)
                                ->first();
        $this->form_i->opd_id = $this->passObj->opd_id;
        $this->form_i->in_patient_id = $this->passObj->in_patient_id;
        $this->form_i->admission_date = $this->passObj->admission_date;

        $this->form_i->il6 = $this->passObj->il6;

        $this->form_i->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_i->entered_by = $this->passObj->entered_by;
        $this->form_i->entry_date = $this->passObj->entry_date;
    }
}
