<?php

namespace App\Traits\TCtms\TQc;

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

trait TQcDBQueries
{

  public function getQCPatientsSealedStatus()
  {
      $status = ['sealed'];
      return Patient::whereIn('status', $status)->get();
  }

  public function getQCPatientsEnrollmentStatus()
  {
      return Enrollment::where('stage_code', '>=', 220)
                        ->where('stage_code', '<', 300)->get();
  }

}