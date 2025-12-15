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

    $newSEInfo->s1 = $input['s1'];
    $newSEInfo->l1 = $input['l1'];
    $newSEInfo->l2 = $input['l2'];
    $newSEInfo->l3 = $input['l3'];
    $newSEInfo->l4 = $input['l4'];
    $newSEInfo->l5 = $input['l5'];

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