<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\LifeStyle;

class EditModiqScore extends Component
{
    //uuid of the patient
    public $uuid;
    public $modq_info;

    public $painIntensitySelected;
    public $personalCareSelected;
    public $liftingSelected;
    public $walkingSelected;
    public $sittingSelected;
    public $standingSelected;
    public $sleepingSelected;
    public $socialLifeSelected;
    public $travelSelected;
    public $empHomeSelected;

    public $selectedCount;
    public $mod_score;
    
    public function render()
    {
        $this->modq_info = LifeStyle::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        return view('livewire.ctms.patients.edit.edit-modiq-score');
    }
}
