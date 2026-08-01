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
use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;
//use App\Models\Ctms\Center;
use App\Models\Common\Chat;
//use App\Models\Ctms\Clinic;

use Illuminate\Support\Facades\Log;

trait TCroDashboard
{
    public function getAllEnrolledActivePatients()
    { //below line for testing only, to be removed in production
      $enrolled = Enrollment::where('status', null)->pluck('patient_uuid')->toArray();
      //below line is the correct one to use in production
      //$enrolled = Enrollment::where('status', 'current')->pluck('patient_uuid')->toArray();

      //now get patient objects parent table, ideall not necessary to as we need only 
      //patient uuid to process. the patient object give opd_id etc..
      return Patient::whereIn('patient_uuid', $enrolled)->get();
    }

    public function getAllEnrolledActivePatientCount()
    {
      return count($this->getAllEnrolledActivePatients());
    }


    public function getAllEnrolledExitedPatients()
    {
      $enrolled = Enrollment::where('status', 'exited')->pluck('patient_uuid')->toArray();
      return Patient::whereIn('patient_uuid', $enrolled)->get();
    }

    public function getAllEnrolledExitedPatientCount()
    {
      return count($this->getAllEnrolledExitedPatients());
    }




}