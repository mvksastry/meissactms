<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\MicroscopicExam;

//forms
use App\Livewire\Forms\clinicals\FormMicroscopicExam;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TMicroscopicExams;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class MicroscopicExams extends Component
{
    use Base;
    use TMicroscopicExams;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
        
    public FormMicroscopicExam $form_l;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_l->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new MicroscopicExam();
        }
        else {
            $this->passObj = MicroscopicExam::where('patient_uuid', $this->patient_uuid)
                                                ->where('data_type', $this->data_type)
                                                ->first();
            $this->form_l->opd_id = $this->passObj->opd_id;
            $this->form_l->in_patient_id = $this->passObj->in_patient_id;
            $this->form_l->admission_date = $this->passObj->admission_date;
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.microscopic-exams');
    }

    public function fnMicroscopicExam()
    {
        $this->input = $this->form_l->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        $result = $this->saveMicroscopicExamData($this->input, $this->passObj);
        LivewireAlert::title('Microscopic Exam Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Microscopic Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
       // $this->msg_panel = true;
        //$sysAlertWarning = false;
        //$this->comSuccess = $msg;
    } 
}
