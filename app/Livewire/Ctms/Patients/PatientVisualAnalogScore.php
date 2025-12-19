<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PatientVAScoreForm;

//Traits
use App\Traits\TCtms\TVAScores;

//logs
use Illuminate\Support\Facades\Log;

class PatientVisualAnalogScore extends Component
{
    //Traits
    use TVAScores;
    //Form bindings
    public PatientVAScoreForm $form;
    //global patient uuid
    public $patient_uuid;



    //Visual Analog Scores
    public $intensity, $location, $onset, $duration, $variation, $quality;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.ctms.patients.patient-visual-analog-score');
    }

    public function fnSaveVAscoreData()
    {
        $this->input = $this->form->all();
        //dd($this->input); //
        $result = $this->saveVAScores($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Visual Analog score data');
        //dd($result); //
    }
}
