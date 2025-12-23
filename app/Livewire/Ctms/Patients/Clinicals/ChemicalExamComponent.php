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

    public $patient_uuid;

    //form bindings 
    public FormChemExam $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.chemical-exam-component');
    }

    public function fnChemExams($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveChemExamData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Chem Exam Data ['.$this->patient_uuid.']');
        //dd($result); //
    }
}
