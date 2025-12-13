<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\VAScore;

class EditVisualAnalogScore extends Component
{
    //uuid of the patient
    public $uuid;
    public $vascore;

    public function render()
    {
        $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        return view('livewire.ctms.patients.edit.edit-visual-analog-score');
    }
}
