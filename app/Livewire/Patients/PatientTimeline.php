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

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        //$this->ptEpoch = $ptEpoch;

        $this->setEpochPatient($patient_uuid);
    }

    public function render()
    {
        //$this->ptEpoch = PatientEpoch::where('patient_uuid', $patienti_uuid)->where('status', 'active')->get();
        //dd("reached",$this->ptEpoch);
        //$this->setEpochPatient($patient_uuid);
        return view('livewire.patients.patient-timeline');
    }

    public function setEpochPatient($patient_uuid)
    {
        $this->ptEpoch = PatientEpoch::where('patient_uuid', $this->patient_uuid)->where('status', 'active')->get();
        //dd($this->ptEpoch);
    }
}
