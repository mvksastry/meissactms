<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\Mdtre;

class EditMdtreInfo extends Component
{
    //uuid of the patient
    public $uuid;
    public $mdtre_info;

    public function render()
    {
        $this->mdtre_info = Mdtre::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        return view('livewire.ctms.patients.edit.edit-mdtre-info');
    }
}
