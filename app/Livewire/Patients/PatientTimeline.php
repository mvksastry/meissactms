<?php

namespace App\Livewire\Patients;

use Livewire\Component;

use App\Models\Ctms\Patient;
use App\Models\Ctms\PatientEpoch;

class PatientTimeline extends Component
{
    //
    public $patient_uuid;
    public $ptEpoch;
    public $oldestDate;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        //$this->ptEpoch = $ptEpoch;

        $this->setEpochPatient($patient_uuid);
    }

    public function render()
    {
        return view('livewire.patients.patient-timeline');
    }

    public function setEpochPatient($patient_uuid)
    {
        $this->ptEpoch = PatientEpoch::where('patient_uuid', $this->patient_uuid)
                                    ->where('status', 'active')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $this->oldestDate = PatientEpoch::where('patient_uuid', $this->patient_uuid)->min('created_at');
        //dd($this->oldestDate);
    }
}
