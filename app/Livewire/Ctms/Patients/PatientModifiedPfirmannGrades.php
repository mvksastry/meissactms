<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PfirmannForm;

//Traits
use App\Traits\TCtms\TPatientPfirmannData;

//logs
use Illuminate\Support\Facades\Log;

class PatientModifiedPfirmannGrades extends Component
{
    //Trait for data handling
    use TPatientPfirmannData;
    //Form bindings
    public PfirmannForm $form;
    //global patient uuid
    public $patient_uuid;

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
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSavePfirmannGrade()
    {
        $this->input = $this->form->all();
        //dd($this->input); //
        $result = $this->savePfirmannGrade($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Pfirmann score data');
        //dd($result); // 
    }
}
