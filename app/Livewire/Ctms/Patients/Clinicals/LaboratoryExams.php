<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\LaboratoryExam;

//forms
use App\Livewire\Forms\Clinicals\FormLabExams;

//traits
use App\Traits\TCtms\TClinicals\TLaboratoryExams;

//logs
use Illuminate\Support\Facades\Log;

class LaboratoryExams extends Component
{

    use TLaboratoryExams;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    public FormLabExams $form_j;

    public function mount($patient_uuid)
    {
        $this->passObj = LaboratoryExam::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_j->opd_id = $this->passObj->opd_id;
        $this->form_j->in_patient_id = $this->passObj->in_patient_id;
        $this->form_j->admission_date = $this->passObj->admission_date;
        $this->form_j->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.laboratory-exams');
    }

    public function fnLabExams()
    {
        $this->input = $this->form_j->all();
        //dd($this->input); // 
        $result = $this->saveLaboratoryExamData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Lab Exam Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }    
}
