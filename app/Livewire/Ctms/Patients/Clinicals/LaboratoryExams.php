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
    
    public function render()
    {
        return view('livewire.ctms.patients.clinicals.laboratory-exams');
    }

    public function fnLabExams($input)
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
