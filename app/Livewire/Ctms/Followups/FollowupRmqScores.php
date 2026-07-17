<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Rmquestion;
use App\Models\Ctms\Patient;
use App\Models\Ctms\RMQReply;

//forms
use App\Livewire\Forms\PatientRMQForm;

//Traits
use App\Traits\TCtms\TPatientRMQData;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class FollowupRmqScores extends Component
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

    use TPatientRMQData;

    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //Form bindings
    public PatientRMQForm $form;

    //Form fields
    public $rmquestions, $rmq_replies=[];
    
    //show if values entered present
    public $srvp;
    public $showOldRmqValPanel = false;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;

        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;

        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');

        $this->srvp = RMQReply::where('patient_uuid', $this->patient_uuid)->where('status', 'draft')->first();
        $this->form->comment_entered_by = $this->srvp->comment_entered_by;
        //dd($this->srvp);
    }

    public function fnSaveRMQInfo()
    {
        //dd($this->rmq_replies);
        $this->form->rmq_replies = json_encode($this->rmq_replies);
        $this->input = $this->form->all();
        //dd($this->input); //
        $result = $this->saveFollowupRMQ($this->input);
        LivewireAlert::title('Follow-up R M Q Data Saved...')->success()->asToast()->show();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved RMQ data');
        //dd($result); // 
    }

    public function saveFollowupRMQ($input)
    {
        $rmq_replies_json = json_encode($this->rmq_replies);
        //dd($rmq_replies_json);
        //$nRmqReply = new RMQReply();
        $nRmq_reply = new RMQReply();

        //dd($nRmq_reply);
        $nRmqReply->patient_uuid = $this->patient_uuid; 
  
        $nRmqReply->opd_id =  $input['opd_id'];
        $nRmqReply->in_patient_id =  $input['in_patient_id'];
        $nRmqReply->admission_date =  $input['admission_date'];

        $nRmq_reply->rmq_replies = $input['rmq_replies'];
        $nRmqReply->status = "follow-up-".$this->data_type;
        $nRmqReply->status_date = date('Y-m-d');

        $nRmq_reply->comment_entered_by = $input['comment_entered_by'];
        $nRmq_reply->entered_by = $input['entered_by'];
        $nRmq_reply->entry_date = $input['entry_date'];

        //dd($nRmq_reply);
        $result = $nRmq_reply->save();
        //here write code to remove form fields for all traits

        //show values entered
        $this->show_rmq_reply_panel = true;
        $this->resetInputs();
        return $result;
    }

    public function resetInputs()
    {
      $this->rmq_replies = [];
    }

}
