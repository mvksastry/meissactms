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
use App\Livewire\Forms\Clinicals\FormMicroscopicExam;

//traits
use App\Traits\TCtms\TClinicals\TMicroscopicExams;

//logs
use Illuminate\Support\Facades\Log;

class MicroscopicExams extends Component
{
    use TMicroscopicExams;

    public $patient_uuid;

    public FormMicroscopicExam $form;
    
    public function render()
    {
        return view('livewire.ctms.patients.clinicals.microscopic-examinatons');
    }

    public function fnMicroscopicExam($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveMicroscopicExamData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Microscopic Data ['.$this->patient_uuid.']');
        //dd($result); //
    } 
}
