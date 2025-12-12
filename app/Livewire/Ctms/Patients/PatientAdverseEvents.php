<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientForm;

class PatientAdverseEvents extends Component
{
    //Form bindings
    public PatientForm $form;

    //Adverse Events
    public $event, $description, $date_incident, $date_recorded, $date_attended, $action_taken, $date_atr, $action_taken_by;

    public function render()
    {
        return view('livewire.ctms.patients.patient-adverse-events');
    }
}
