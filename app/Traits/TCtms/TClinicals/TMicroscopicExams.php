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

  public function saveMicroscopicExamData($input)
  {

      $newMEData = new MicroscopicExam();

      
      $newMEData->pus_cells = $input['pus_cells'];
      $newMEData->epithelial_cells = $input['epithelial_cells'];
      $newMEData->rbcs = $input['rbcs'];
      $newMEData->yeast_cells = $input['yeast_cells'];
      $newMEData->bacteria = $input['bacteria'];

      $newMEData->me_report_file = $input['me_report_file'];
      $newMEData->me_report_file_path = $input['me_report_file_path'];

      //--------X Common to all tables X-------------//
      $newMEData->comment_entered_by = $input['comment_entered_by'];
      $newMEData->entered_by = $input['entered_by'];
      $newMEData->entry_date = $input['entry_date'];


      $newMEData->save();
  }

}