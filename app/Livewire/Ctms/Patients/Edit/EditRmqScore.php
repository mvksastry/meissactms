<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;

use App\Models\Ctms\RMQReply;
use App\Models\Ctms\Rmquestion;

class EditRmqScore extends Component
{
    //uuid of the patient
    public $uuid;
    public $rmq_reply;
    public $rmquestions;

    public function render()
    {   
        $this->rmquestions = Rmquestion::all();
        $this->rmq_reply = RMQReply::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        return view('livewire.ctms.patients.edit.edit-rmq-score');
    }
}
