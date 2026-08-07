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
use App\Livewire\Forms\clinicals\FormRenalFunction;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TRenalFunctions;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class RenalFunctionComponent extends Component
{
    use Base;
    use TRenalFunctions;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormRenalFunction $form_m;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_m->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new RenalFunction();
        }
        else {
            $this->setData();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.renal-function-component');
    }

    public function fnRenalFunction()
    {
        $this->validate();
        $this->input = $this->form_m->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        $result = $this->saveRenalFunctionsData($this->input, $this->passObj);
        LivewireAlert::title('Renal Function Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Renal Fn Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->setData();
    } 
    public function setData()
    {
        $this->passObj = RenalFunction::where('patient_uuid', $this->patient_uuid)
                                        ->where('data_type', $this->data_type)
                                        ->first();
        $this->form_m->opd_id = $this->passObj->opd_id;
        $this->form_m->in_patient_id = $this->passObj->in_patient_id;
        $this->form_m->admission_date = $this->passObj->admission_date;

        $this->form_m->uric_acid = $this->passObj->uric_acid;

        $this->form_m->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_m->entered_by = $this->passObj->entered_by;
        $this->form_m->entry_date = $this->passObj->entry_date;
    } 
}
