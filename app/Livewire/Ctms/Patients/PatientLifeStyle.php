<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientLSForm;

use App\Models\Ctms\LifeStyle;

//traits
use App\Traits\TCtms\TPatientLifeStyle;

class PatientLifeStyle extends Component
{
    //Trait binding
    use TPatientLifeStyle;

    //Form bindings
    public PatientLSForm $form;

    //data binding
    public $input;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = null, $sysAlertWarning = null, $sysAlertInfo = null, $sysAlertDanger = null;
    public $comDanger = null, $comWarning = null, $comInfo = null, $comSuccess = null;

    public $cross_leg_sitting, $standing, $ls3, $ls4, $ls5, $ls6, $life_style_description;

    public function fnSavePatientLSInfo()
    {
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->entered_by);
        $this->input = $this->form->all();
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->savePatientLSInformation($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }

}
