<?php

namespace App\Livewire\Ctms\Datatables;

use Livewire\Component;

class ClinicalTestsComponent extends Component
{
    public $patient_uuid;
    
    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
    }

    public function render()
    {
        return view('livewire.ctms.datatables.clinical-tests-component');
    }
}
