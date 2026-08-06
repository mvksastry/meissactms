<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\LiverFunction;

//forms
use App\Livewire\Forms\clinicals\FormLiverFunction;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TLiverFunctions;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class LiverFunctions extends Component
{
    use Base;
    use TLiverFunctions;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormLiverFunction $form_k;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_k->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new LiverFunction();
        }
        else {
            $this->passObj = LiverFunction::where('patient_uuid', $this->patient_uuid)
                                                ->where('data_type', $this->data_type)
                                                ->first();
            $this->form_k->opd_id = $this->passObj->opd_id;
            $this->form_k->in_patient_id = $this->passObj->in_patient_id;
            $this->form_k->admission_date = $this->passObj->admission_date;
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.liver-functions');
    }

    public function fnLiverFunction()
    {
        $this->input = $this->form_k->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
       // dd($this->input); // 
        $result = $this->saveLiverFunctionData($this->input, $this->passObj);
        LivewireAlert::title('Liver Function Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Liv function Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        //$this->msg_panel = true;
        //$sysAlertWarning = false;
        //$this->comSuccess = $msg;
    } 
}
