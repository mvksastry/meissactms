<?php

namespace App\Traits\TCtms\TQa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Center;
use App\Models\Common\Chat;
use App\Models\Ctms\Clinic;

use App\Models\Ctms\Decisions\Enrollment;

use Illuminate\Support\Facades\Log;

trait TQaDBQueries
{

  public function getQAPatientsSealedStatus()
  {
      $status = ['sealed'];
      return Patient::whereIn('status', $status)->get();
  }

  public function getQAPatientsEnrollmentStatus()
  {
      return Enrollment::where('stage_code', '>=', 300)
                        ->where('stage_code', '<', 320)->get();
  }


}