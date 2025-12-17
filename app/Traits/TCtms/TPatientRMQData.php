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
//dd($rmq_replies_json);
      //$nRmqReply = new RMQReply();
      $nRmq_reply = RMQReply::where('patient_uuid', $this->patient_uuid)->where('status', 'draft')->first();

      //dd($nRmq_reply);
      //$nRmqReply->patient_uuid = $this->patient_uuid; 
  
      //$nRmqReply->opd_id =  $input['opd_id'];
      //$nRmqReply->in_patient_id =  $input['in_patient_id'];
      //$nRmqReply->admission_date =  $input['admission_date'];

      $nRmq_reply->rmq_replies = $input['rmq_replies'];
      //$nRmqReply->status = "draft";
      //$nRmqReply->status_date = date('Y-m-d');

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