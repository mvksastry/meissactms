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

  public function saveUrineRoutineData($input)
  {
        //dd($input);
        $newRUInfo = new UrineRoutine();

        $newRUInfo->physical_exam = $input['physical_exam'];
        $newRUInfo->quantity = $input['quantity'];
        $newRUInfo->colour = $input['colour'];
        $newRUInfo->appearance = $input['appearance'];
        $newRUInfo->deposits = $input['deposits'];
        $newRUInfo->ph = $input['ph'];
        $newRUInfo->specific_gravity = $input['specific_gravity'];

        $newRUInfo->ur_report_file = $input['ur_report_file'];
        $newRUInfo->ur_report_file_path = $input['ur_report_file_path'];
        //dd($newRUInfo);
        $newRUInfo->save();

  }

}