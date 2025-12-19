<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\RMQReply;
use App\Models\Ctms\Rmquestion;

//forms
use App\Livewire\Forms\PatientRMQForm;

//traits, facades

//logs
use Illuminate\Support\Facades\Log;

class EditRmqScore extends Component
{
    public $rmqreplies = [
        1 => "I stay at home most of the time because of my back.",
        2 => "I change position frequently to try to get my back comfortable.",
        3 => "I walk more slowly than usual because of my back. ", 
        4 => "Because of my back, I am not doing any jobs that I usually do around the house.", 
        5 => "Because of my back, I use a handrail to get upstairs. ", 
        6 => "Because of my back, I lie down to rest more often.  ", 
        7 => "Because of my back, I have to hold on to something to get out of an easy chair.", 
        8 => "Because of my back, I try to get other people to do things for me.", 
        9 => "I get dressed more slowly than usual because of my back.", 
        10 => "I only stand up for short periods of time because of my back.", 
        11 => "Because of my back, I try not to bend or kneel down.  ", 
        12 => "I find it difficult to get out of a chair because of my back.", 
        13 => "My back is painful almost all of the time.", 
        14 => "I find it difficult to turn over in bed because of my back.", 
        15 => "My appetite is not very good because of my back.", 
        16 => "I have trouble putting on my socks (or stockings) because of the pain in my back.", 
        17 => "I can only walk short distances because of my back pain.", 
        18 => "I sleep less well because of my back.", 
        19 => "Because of my back pain, I get dressed with the help of someone else.", 
        20 => "I sit down for most of the day because of my back.", 
        21 => "I avoid heavy jobs around the house because of my back.", 
        22 => "Because of back pain, I am more irritable and bad tempered with people than usual.", 
        23 => "Because of my back, I go upstairs more slowly than usual.", 
        24 => "I stay in bed most of the time because of my back.",
    ];

    //binding
    public PatientRMQForm $form;

    //uuid of the patient
    public $uuid;
    public $rmq_reply;
    public $rmq_replies = [];
    //public $new_rmq_replies = [];
    public $rmquestions;

    public $old_replies;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {   
        $this->rmquestions = Rmquestion::all();
        $this->rmq_reply = RMQReply::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->form->entered_by = Auth::user()->name;
        //dd($this->rmq_reply);
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
        $this->message_panel = false;
        $this->validate();
        $this->form->rmq_replies = json_encode($this->rmq_replies);
        $this->input = $this->form->all();
        
        //dd($this->input);       
        $this->message_panel = true;
        $name = $this->uuid;
        try {
            $result = RMQReply::where('patient_uuid', $this->uuid)->update($this->input);
            if ($result) {        
                $msg = 'Patient ['.$name.'] update successfull!';  
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
            } else {
                $msg = 'Patient ['.$name.'] could not be saved';
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } 
    }
}
