<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\ClinicalData;

class EditClinicalInfo extends Component
{
    //uuid of the patient
    public $uuid;
    public $clinical_info;

    public function render()
    {
        $this->clinical_info = ClinicalData::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        
        return view('livewire.ctms.patients.edit.edit-clinical-info');
    }
}