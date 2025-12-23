<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\ChemicalExam;

//forms
use App\Livewire\Forms\Clinicals\FormChemExam;

//traits
use App\Traits\TCtms\TClinicals\TChemExams;

//logs
use Illuminate\Support\Facades\Log;

class ChemicalExamComponent extends Component
{
    //traits
    use TChemExams;

    public $patient_uuid, $passObj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    //form bindings 
    public FormChemExam $form_d;

    public function mount($patient_uuid)
    {
        $this->passObj = ChemicalExam::where('patient_uuid', $patient_uuid)->first();
        //dd($this->passObj);
        $this->patient_uuid = $patient_uuid;
        // Initialize the main form (which initializes the sub-form)
        $this->form_d->opd_id = $this->passObj->opd_id;
        $this->form_d->in_patient_id = $this->passObj->in_patient_id;
        $this->form_d->admission_date = $this->passObj->admission_date;
        $this->form_d->entered_by = Auth::user()->name;
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.chemical-exam-component');
    }

    public function fnChemExams()
    {
        $this->input = $this->form_d->all();
        //dd($this->input); // 
        $result = $this->saveChemExamData($this->input, $this->passObj);
        $msg = 'User ['.Auth::user()->name.'] saved Chem Exam Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }
}
