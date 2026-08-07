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
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TElectrolytes;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class ElectrolyteComponent extends Component
{
    use Base;
    use TElectrolytes;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormElectrolytes $form_g;
   
    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
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
            $this->setData();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.electrolyte-component');
    }

    public function fnElectrolytes()
    {
        $this->validate();
        $this->input = $this->form_g->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        $result = $this->saveElectrolyteData($this->input, $this->passObj);
        LivewireAlert::title('Electrolyte Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Electrolytes Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->setData();
    }

    public function setData()
    {
        $this->passObj = Electrolytes::where('patient_uuid', $this->patient_uuid)
                                        ->where('data_type', $this->data_type)
                                        ->first();
        $this->form_g->opd_id = $this->passObj->opd_id;
        $this->form_g->in_patient_id = $this->passObj->in_patient_id;
        $this->form_g->admission_date = $this->passObj->admission_date;

        $this->form_g->sodium = $this->passObj->sodium;
        $this->form_g->potassium = $this->passObj->potassium;
        $this->form_g->chloride = $this->passObj->chloride;

        $this->form_g->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_g->entered_by = $this->passObj->entered_by;
        $this->form_g->entry_date = $this->passObj->entry_date;
    } 
}
