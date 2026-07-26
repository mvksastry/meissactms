<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//Models
use App\Models\Ctms\Patient;

//traits
use Illuminate\Support\Facades\Log;

trait TPatientDuplicateCheck
{
    //use Base;

  public function getDuplicateEntries($input)
  {
    $duplicateEntries = Patient::where('subject_id', $input['subject_id'])
                                ->where('name', $input['name'])
                                ->where('gender', $input['gender'])
                                ->where('primary_phone_number',  $input['primary_phone_number'])
                                ->where('date_of_birth', $input['date_of_birth'])
                                ->get();

    if(count($duplicateEntries) > 0)
    {
      return true;
    } 
    else {
      return false;
    }

  }

}