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

    public $patient_uuid;

    public FormLabExams $form;
    
    public function render()
    {
        return view('livewire.ctms.patients.clinicals.laboratory-exams');
    }

    public function fnLabExams($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveLaboratoryExamData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Lab Exam Data ['.$this->patient_uuid.']');
        //dd($result); //
    }    
}
