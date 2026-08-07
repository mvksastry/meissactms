<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\BloodUrea;

//forms
use App\Livewire\Forms\clinicals\FormBloodUrea;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TBloodUrea;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class BloodUreaComponent extends Component
{
    use Base;
    use TBloodUrea;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public FormBloodUrea $form_c;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_c->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new BloodUrea();
        }
        else {
            $this->setData();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.blood-urea-component');
    }

    public function fnBloodUrea()
    {
        $this->validate();
        $this->input = $this->form_c->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        $result = $this->saveBloodUreaData($this->input, $this->passObj);
        LivewireAlert::title('Blood Urea Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Blood Urea Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->setData();
    }

    public function setData()
    {
        $this->passObj = BloodUrea::where('patient_uuid', $this->patient_uuid)
                                    ->where('data_type', $this->data_type)
                                    ->first();
        $this->form_c->opd_id = $this->passObj->opd_id;
        $this->form_c->in_patient_id = $this->passObj->in_patient_id;
        $this->form_c->admission_date = $this->passObj->admission_date;

        $this->form_c->uric_acid = $this->passObj->uric_acid;
        $this->form_c->blood_urea_nitrogen = $this->form_c->blood_urea_nitrogen;

        $this->form_c->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_c->entered_by = $this->passObj->entered_by;
        $this->form_c->entry_date = $this->passObj->entry_date;
    }
}
