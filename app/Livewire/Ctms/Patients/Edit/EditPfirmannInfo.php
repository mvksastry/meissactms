<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\PfirmannGrade;

class EditPfirmannInfo extends Component
{
    //uuid of the patient
    public $uuid;
    public $pfirmg_info;

    public function render()
    {
        $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        return view('livewire.ctms.patients.edit.edit-pfirmann-info');
    }
}
