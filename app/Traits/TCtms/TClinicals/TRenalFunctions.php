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

  public function saveRenalFunctionsData($input)
  {

      $newRFdata = new RenalFunction();

      $newRFdata->uric_acid = $input['uric_acid'];
      $newRFdata->uricacid_report_file = $input['uricacid_report_file'];
      $newRFdata->uricacid_report_file_path = $input['uricacid_report_file_path'];


      $newRFdata->save();

  }
}