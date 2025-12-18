<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PatientRMQForm;

//models
use App\Models\Ctms\Rmquestion;

//Traits
use App\Traits\TCtms\TPatientRMQData;

use App\Models\Ctms\Patient;
use App\Models\Ctms\RMQReply;

class PatientRmqScore extends Component
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

    //Form bindings
    public PatientRMQForm $form;

    //Form fields
    public $rmquestions, $rmq_replies=[];
    
    //show if values entered present
    public $srvp;
    public $showOldRmqValPanel = false;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        
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

    public function render()
    {
        $this->rmquestions = Rmquestion::all();
        //dd($this->rmquestions);
        return view('livewire.ctms.patients.patient-rmq-score');
    }

    public function fnSaveRMQInfo()
    {
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->rmq_replies);
        //dd($this->entered_by);
        $this->form->rmq_replies = json_encode($this->rmq_replies);
        $this->input = $this->form->all();
        
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->saveRMQ($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }
}
