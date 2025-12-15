<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\RMQReply;

use Illuminate\Support\Facades\Log;

trait TPatientRMQData
{
    public function saveRMQ($input)
    {

      $rmq_replies_json = json_encode($this->rmq_replies);

      $nRmqReply = new RMQReply();

      $nRmqReply->patient_uuid = $this->patient_uuid; 
  
      $nRmqReply->opd_id =  $input['opd_id'];
      $nRmqReply->in_patient_id =  $input['in_patient_id'];
      $nRmqReply->admission_date =  $input['admission_date'];

      $nRmqReply->rmq_replies = $rmq_replies_json;

      $nRmqReply->status = "draft";
      $nRmqReply->status_date = date('Y-m-d');

      $nRmqReply->comment_entered_by = $input['comment_entered_by'];
      $nRmqReply->entered_by = $input['entered_by'];
      $nRmqReply->entry_date = $input['entry_date'];

      //$nRmqReply->verified_by = $input['verified_by'];
      //$nRmqReply->verified_date = $input['verified_date'];
      //$nRmqReply->sealed_by = $input['entry_sealed_by'];
      //$nRmqReply->sealed_date = $input['entry_sealed_date'];

      //dd($nRmqReply);
      $result = $nRmqReply->save();
      //here write code to remove form fields for all traits
      $this->resetInputs();
      return $result;

    }

    public function resetInputs()
    {
      $this->rmq_replies = [];
    }
}