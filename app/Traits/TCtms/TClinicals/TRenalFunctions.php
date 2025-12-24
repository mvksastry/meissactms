<?php

namespace App\Traits\TCtms\TClinicals;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Clinicals\RenalFunction;

use Illuminate\Support\Facades\Log;

trait TRenalFunctions
{

  public function saveRenalFunctionsData($input, $passObj)
  {

      //$passObj = new RenalFunction();
      $input = array_map(function($value) 
      {
          return $value === "" ? NULL : $value;
      }, $input);

      $passObj->uric_acid = $input['sr_uric_acid'];
      $passObj->uricacid_report_file = $input['uricacid_report_file'];
      $passObj->uricacid_report_file_path = $input['uricacid_report_file_path'];

      //--------X Common to all tables X-------------//
      $passObj->comment_entered_by = $input['comment_entered_by'];
      $passObj->entered_by = $input['entered_by'];
      $passObj->entry_date = $input['entry_date'];

      $passObj->save();

  }
}