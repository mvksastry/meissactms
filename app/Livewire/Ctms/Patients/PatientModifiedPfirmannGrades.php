<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PfirmannForm;

use App\Traits\TCtms\TPatientPfirmannData;

use App\Models\Ctms\Patient;

class PatientModifiedPfirmannGrades extends Component
{
    //Trait for data handling
    use TPatientPfirmannData;

    //global patient uuid
    public $patient_uuid;

    //Form bindings
    public PfirmannForm $form;
    
    public $modified_pfirmans_grade = null;

    public function render()
    {
        return view('livewire.ctms.patients.patient-modified-pfirmann-grades');
    }

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
