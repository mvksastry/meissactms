<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PfirmannForm;

use App\Traits\TCtms\TPatientPfirmannData;


class PatientModifiedPfirmannGrades extends Component
{
    //Trait for data handling
    use TPatientPfirmannData;

    //Form bindings
    public PfirmannForm $form;
    
    public $modified_pfirmans_grade = null;

    public function render()
    {
        return view('livewire.ctms.patients.patient-modified-pfirmann-grades');
    }

    
    public function fnSavePfirmannGrade()
    {
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->entered_by);
        $this->input = $this->form->all();
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->savePfirmannGrade($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }
}
