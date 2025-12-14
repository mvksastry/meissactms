<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

use App\Models\Ctms\Patient;

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
    public $input, $patient_uuid;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = null, $sysAlertWarning = null, $sysAlertInfo = null, $sysAlertDanger = null;
    public $comDanger = null, $comWarning = null, $comInfo = null, $comSuccess = null;

    public $cross_leg_sitting, $standing, $ls3, $ls4, $ls5, $ls6, $life_style_description;

    public function fnSavePatientLSInfo()
    {
        $this->input = $this->form->all();
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->savePatientLSInformation($this->input);
    }

}
