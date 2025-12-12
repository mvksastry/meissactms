<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;

use Livewire\WithFileUploads;

//models
use App\Models\Ctms\Patient;


class ManageHealth extends Component
{
    use WithFileUploads;

    //default panels
    public $patientInfoButtons = false;

    //Form openings
    public $openNewPatientEntryForm = false;
    public $openNewLifeStyleEntryForm = false;
    public $openNewClinicalInvestigationsEntryForm = false;
    public $openNewSensoryExaminationsEntryForm = false;
    public $openMDTREExaminationsEntryForm = false;
    public $openRadiographsEntryForm = false;

    public $openModifiedPfirmannGradesEntryForm = false;
    public $openVisualAnalogScore = false;
    public $openMODIQScoreEntryForm = false;
    public $openRMQScoreEntryForm = false;
    public $openAdverseEventsEntryForm = false;

    //active patient panel
    public $activePatients, $patient_uuid;

    public function render()
    {
        $this->activePatients = Patient::all();
        //dd($this->activePatients);
        return view('livewire.ctms.patients.manage-health');
    }

    public function selectedPatient($id)
    {
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        $this->patientInfoButtons = true;
    }


    
}
