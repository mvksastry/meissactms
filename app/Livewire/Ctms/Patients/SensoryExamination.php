<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientSEForm;

use App\Traits\TCtms\TPatientSEData;

class SensoryExamination extends Component
{
    use TPatientSEData;

    //Form bindings
    public PatientSEForm $form;

    //SE Entry scores
    public $s1;
    //public $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $s10;
    //public $t08, $t09, $t10, $t11, $t12;
    public $l1, $l2, $l3, $l4, $l5;

    public function fnSaveSensoryExaminationData()
    {
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientSEInformation($this->input);

        //dd($result); // 
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }



}
