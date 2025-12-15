<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PatientCIForm;

use App\Models\Ctms\ClinicalData;

class EditClinicalInfo extends Component
{
    //Form bindings
    public PatientCIForm $form;

    //uuid of the patient
    public $uuid;
    public $clinical_info = null;

    public function render()
    {
        $this->clinical_info = ClinicalData::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->clinical_info);
        $this->setClinicalDataForm($this->clinical_info);
        return view('livewire.ctms.patients.edit.edit-clinical-info');
    }

    public function setClinicalDataForm($clinical_info)
    {
        $this->form->opd_id = ($clinical_info != null) ? $clinical_info->opd_id : "";
        $this->form->in_patient_id = ($clinical_info != null) ? $clinical_info->in_patient_id : "";
        $this->form->admission_date = ($clinical_info != null) ? $clinical_info->admission_date : "";
    }

    public function fnSaveEditedClinicalData()
    {      
        $this->input = $this->form->all();
        
        //dd($this->input);
        $result = ClinicalData::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
       //dd($this->input);             
    }
}