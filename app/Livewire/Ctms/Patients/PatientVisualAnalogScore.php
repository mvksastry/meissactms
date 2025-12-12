<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientVAScoreForm;

//Traits
use App\Traits\TCtms\TVAScores;

class PatientVisualAnalogScore extends Component
{
    //Traits
    use TVAScores;

    //Form bindings
    public PatientVAScoreForm $form;

    //Visual Analog Scores
    public $intensity, $location, $onset, $duration, $variation, $quality;

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
