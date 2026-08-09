<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\UrineRoutine;

//forms
use App\Livewire\Forms\clinicals\FormUrineRoutine;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TUrineRoutine;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class UrineRoutineComponent extends Component
{
    use Base;
    use TUrineRoutine;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormUrineRoutine $form_n;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_n->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new UrineRoutine();
        }
        else {
            $this->setData();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.urine-routine-component');
    }

    public function fnUrineRoutine()
    {
        $this->form_n->validate();
        $this->input = $this->form_n->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input, $this->patient_uuid, $this->data_type, $this->passObj); // 
        $result = $this->saveUrineRoutineData($this->input, $this->passObj);
        LivewireAlert::title('Urine Routine Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Urine Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->setData();
    } 

    public function setData()
    {
        $this->passObj = UrineRoutine::where('patient_uuid', $this->patient_uuid)
                                        //->where('data_type', $this->data_type)
                                        ->first();

        $this->form_n->opd_id = $this->passObj->opd_id;
        $this->form_n->in_patient_id = $this->passObj->in_patient_id;
        $this->form_n->admission_date = $this->passObj->admission_date;

        $this->form_n->physical_exam = $this->passObj->physical_exam;
        $this->form_n->quantity = $this->passObj->quantity;
        $this->form_n->colour = $this->passObj->colour;
        $this->form_n->appearance = $this->passObj->appearance;
        $this->form_n->deposits = $this->passObj->deposits;
        $this->form_n->ph = $this->passObj->ph;
        $this->form_n->specific_gravity = $this->passObj->specific_gravity;


        $this->form_n->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_n->entered_by = $this->passObj->entered_by;
        $this->form_n->entry_date = $this->passObj->entry_date;
    }
}
