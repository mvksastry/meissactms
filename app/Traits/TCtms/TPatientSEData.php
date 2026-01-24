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
    //$newSEInfo = new SensoryExamination();
    $newSEInfo = SensoryExamination::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
    //$newSEInfo->patient_uuid = $this->patient_uuid; 
 
    $newSEInfo->lL1 = $input['lL1'];
    $newSEInfo->lL2 = $input['lL2'];
    $newSEInfo->lL3 = $input['lL3'];
    $newSEInfo->lL4 = $input['lL4'];
    $newSEInfo->lL5 = $input['lL5'];
    $newSEInfo->lS1 = $input['lS1'];

    $newSEInfo->rL1 = $input['rL1'];
    $newSEInfo->rL2 = $input['rL2'];
    $newSEInfo->rL3 = $input['rL3'];
    $newSEInfo->rL4 = $input['rL4'];
    $newSEInfo->rL5 = $input['rL5'];
    $newSEInfo->rS1 = $input['rS1'];

    $newSEInfo->comment_entered_by = $input['comment_entered_by'];
    $newSEInfo->entered_by = $input['entered_by'];
    $newSEInfo->entry_date = $input['entry_date'];
    //dd($newSEInfo);
    $result = $newSEInfo->save();
    return $result;
  }

}