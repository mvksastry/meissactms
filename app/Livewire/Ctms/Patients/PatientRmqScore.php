<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientRMQForm;

//models
use App\Models\Ctms\Rmquestion;

//Traits
use App\Traits\TCtms\TPatientRMQData;

class PatientRmqScore extends Component
{
    use TPatientRMQData;

    //global patient uuid
    public $patient_uuid;

    //Form bindings
    public PatientRMQForm $form;

    //Form fields
    public $rmquestions, $rmq_replies=[];
    
    public function render()
    {
        $this->rmquestions = Rmquestion::all();
        //dd($this->rmquestions);
        return view('livewire.ctms.patients.patient-rmq-score');
    }

    public function fnSaveRMQInfo()
    {
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->rmq_replies);
        //dd($this->entered_by);
        $this->input = $this->form->all();
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->saveRMQ($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }
}
