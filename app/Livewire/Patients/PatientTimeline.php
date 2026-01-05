<?php

namespace App\Livewire\Patients;

use Livewire\Component;

use App\Models\Ctms\Patient;
use App\Models\Ctms\PatientEpoch;

use App\Traits\Base;

class PatientTimeline extends Component
{
    //
    use Base;

    public $patient_uuid;
    public $ptEpoch;
    public $oldestDate;
    public $et;

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
        $start = date('Y-m-d H:i:s');
        $this->ptEpoch = PatientEpoch::where('patient_uuid', $this->patient_uuid)
                                    ->where('status', 'active')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        foreach($this->ptEpoch as $row)
        {
            $end = $row->created_at;
            $row->et = $this->elapsedTime($start, $end);  
        }
        $this->oldestDate = PatientEpoch::where('patient_uuid', $this->patient_uuid)->min('created_at');
        //dd($this->ptEpoch, $this->oldestDate);
    }
}
