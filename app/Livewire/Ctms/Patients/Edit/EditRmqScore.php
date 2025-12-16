<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PatientRMQForm;

use App\Models\Ctms\RMQReply;
use App\Models\Ctms\Rmquestion;

class EditRmqScore extends Component
{
    //binding
    public PatientRMQForm $form;

    //uuid of the patient
    public $uuid;
    public $rmq_reply;
    public $rmq_replies = [];
    //public $new_rmq_replies = [];
    public $rmquestions;

    public $old_replies;

    public function render()
    {   
        $this->rmquestions = Rmquestion::all();
        $this->rmq_reply = RMQReply::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->setRmqScoreData($this->rmq_reply);
        return view('livewire.ctms.patients.edit.edit-rmq-score');
    }

    public function setRmqScoreData($rmq_reply)
    {
        //dd($rmq_reply);
        $this->form->opd_id = ($rmq_reply != null) ? $rmq_reply->opd_id : "";
        $this->form->in_patient_id = ($rmq_reply != null) ? $rmq_reply->in_patient_id : "";
        $this->form->admission_date = ($rmq_reply != null) ? $rmq_reply->admission_date : null;

        $this->form->comment_entered_by = ($rmq_reply != null) ? $rmq_reply->comment_entered_by : "";
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = ($rmq_reply != null) ? $rmq_reply->entry_date : null;
        //dd($this->form);
    }

    public function fnEditRMQInfo()
    {
        $this->form->rmq_replies = json_encode($this->rmq_replies);
        $this->input = $this->form->all();
        
        //dd($this->rmq_replies, $this->uuid, $this->input, $this->form);
        $result = RMQReply::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
        
        $this->dispatch('close_modqscore_panel'); 
    }
}
