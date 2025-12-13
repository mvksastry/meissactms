<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\LifeStyle;

class EditLifestyleInfo extends Component
{
    //uuid of the patient
    public $uuid;
    public $ls_info;

    public function render()
    {
        $this->ls_info = LifeStyle::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        return view('livewire.ctms.patients.edit.edit-lifestyle-info');
    }
}
