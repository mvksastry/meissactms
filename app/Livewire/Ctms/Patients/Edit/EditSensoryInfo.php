<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\SensoryExamination;

class EditSensoryInfo extends Component
{
    //uuid of the patient
    public $uuid;
    public $se_info;

    public function render()
    {
        $this->se_info = SensoryExamination::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        return view('livewire.ctms.patients.edit.edit-sensory-info');
    }
}
