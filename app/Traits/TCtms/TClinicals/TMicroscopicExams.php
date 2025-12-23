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
use App\Models\Ctms\Clinicals\MicroscopicExam;

use Illuminate\Support\Facades\Log;

trait TMicroscopicExams
{

  public function saveMicroscopicExamData($input, $passObj)
  {

      //$passObj = new MicroscopicExam();

      $passObj->pus_cells = $input['pus_cells'];
      $passObj->epithelial_cells = $input['epithelial_cells'];
      $passObj->rbcs = $input['rbcs'];
      $passObj->yeast_cells = $input['yeast_cells'];
      $passObj->bacteria = $input['bacteria'];

      $passObj->me_report_file = $input['me_report_file'];
      $passObj->me_report_file_path = $input['me_report_file_path'];

      //--------X Common to all tables X-------------//
      $passObj->comment_entered_by = $input['comment_entered_by'];
      $passObj->entered_by = $input['entered_by'];
      $passObj->entry_date = $input['entry_date'];


      $passObj->save();
  }

}