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
use App\Models\Ctms\SensoryExamination;

use Illuminate\Support\Facades\Log;

trait TPatientSEData
{

  public function savePatientSEInformation($input)
  {
    $newSEInfo = new SensoryExamination();

    $newSEInfo->patient_uuid = $this->patient_uuid; 

    $newSEInfo->opd_id = $input['opd_id'];
    $newSEInfo->in_patient_id = $input['in_patient_id'];
    $newSEInfo->admission_date = $input['admission_date'];

    $newSEInfo->S1 = $input['S1'];
    $newSEInfo->L1 = $input['L1'];
    $newSEInfo->L2 = $input['L2'];
    $newSEInfo->L3 = $input['L3'];
    $newSEInfo->L4 = $input['L4'];
    $newSEInfo->L5 = $input['L5'];

    $newSEInfo->status = "draft";
    $newSEInfo->status_date = date('Y-m-d');

    $newSEInfo->comment_entered_by = $input['comment_entered_by'];
    $newSEInfo->entered_by = $input['entered_by'];
    $newSEInfo->entry_date = $input['entry_date'];
    //$newSEInfo->verified_by = $input['verified_by'];
    //$newSEInfo->verified_date = $input['verified_date'];
    //$newSEInfo->sealed_by = $input['entry_sealed_by'];
    //$newSEInfo->sealed_date = $input['entry_sealed_date'];
    //dd($newSEInfo);
    $result = $newSEInfo->save();
    return $result;
  }

}