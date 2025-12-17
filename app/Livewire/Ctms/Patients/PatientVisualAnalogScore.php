<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientVAScoreForm;

//Traits
use App\Traits\TCtms\TVAScores;

use App\Models\Ctms\Patient;

class PatientVisualAnalogScore extends Component
{
    //Traits
    use TVAScores;

    //global patient uuid
    public $patient_uuid;

    //Form bindings
    public PatientVAScoreForm $form;

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
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->entered_by);
        $this->input = $this->form->all();
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->saveVAScores($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";





    }
}
