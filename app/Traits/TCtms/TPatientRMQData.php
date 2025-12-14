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

trait TPatientRMQData
{
    public function saveRMQ($input)
    {

      $rmq_replies_json = json_encode($this->rmq_replies);

      $nRmqReoly = new RMQReply();

      $nRmqReoly->patient_uuid = $this->patient_uuid; 
      $nRmqReoly->center_id =  1; //$input['center_id'];
      $nRmqReoly->ctarm_id =  1; //$input['ctarm_id'];
      $nRmqReoly->opd_id =  $input['opd_id'];
      $nRmqReoly->in_patient_id =  $input['in_patient_id'];
      $nRmqReoly->admission_date =  $input['admission_date'];
      $nRmqReoly->aadhar_id = null;
      $nRmqReoly->pan_num = null;
      $nRmqReoly->other_id = null;

      $nRmqReoly->rmq_replies = $rmq_replies_json;

      $nRmqReoly->entered_by = $input['entered_by'];
      $nRmqReoly->entry_date = $input['entry_date'];
      $nRmqReoly->verified_by = $input['verified_by'];
      $nRmqReoly->verified_date = $input['verified_date'];
      $nRmqReoly->sealed_by = $input['entry_sealed_by'];
      $nRmqReoly->sealed_date = $input['entry_sealed_date'];

      //dd($nRmqReoly);
      $result = $nRmqReoly->save();
      //here write code to remove form fields for all traits
      $this->resetInputs();
      return $result;

    }

    public function resetInputs()
    {
      $this->rmq_replies = [];
    }
}