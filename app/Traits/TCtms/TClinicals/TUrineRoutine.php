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
use App\Models\Ctms\Clinicals\UrineRoutine;

use Illuminate\Support\Facades\Log;

trait TUrineRoutine
{

  public function saveUrineRoutineData($input, $passObj)
  {
        //dd($input);
        //$passObj = new UrineRoutine();

        $passObj->physical_exam = $input['physical_exam'];
        $passObj->quantity = $input['quantity'];
        $passObj->colour = $input['colour'];
        $passObj->appearance = $input['appearance'];
        $passObj->deposits = $input['deposits'];
        $passObj->ph = $input['ph'];
        $passObj->specific_gravity = $input['specific_gravity'];

        $passObj->ur_report_file = $input['ur_report_file'];
        $passObj->ur_report_file_path = $input['ur_report_file_path'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        //dd($passObj);
        $passObj->save();

  }

}