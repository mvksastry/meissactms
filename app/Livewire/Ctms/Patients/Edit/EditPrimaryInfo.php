<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Ctms\Patient;

class EditPrimaryInfo extends Component
{
    //uuid of the patient
    public $uuid;

    //Object to view
    public $patientPrimaryInfo;

    /*
    protected $listeners = [
    'patientSelected' => 'setPatientUuid',
    ];
     #[On('patientSelected')] 
    public function setPatientUuid($uuid)
    {
        //dd("listening");
        $this->patientPrimaryInfo = Patient::where('status', $uuid)->get();
        //dd($uuid);
        $this->uuid = $uuid;
    }
    public function mount($uuid)
    {
        $this->uuid = $uuid;
    }
    */
    public function render()
    {
        //dd($this->uuid);
        $this->patientPrimaryInfo = Patient::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        //dd($this->uuid);
        return view('livewire.ctms.patients.edit.edit-primary-info');
    }
}
