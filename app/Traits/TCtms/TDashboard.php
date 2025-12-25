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
use App\Models\Ctms\Center;
use App\Models\Ctms\Clinic;

use Illuminate\Support\Facades\Log;

trait TDashboard
{
    public function getAllCenters()
    {
        return Center::where('status', 'active')->get();
    }

    public function getAllClinics()
    {
        return Clinic::where('status', 'active')->get();
    }

    public function getPatientDataDraftStatus()
    {
        return Patient::where('status', 'draft')->get();
    }

    public function getPatientDataActiveStatus()
    {
        return Patient::where('status', 'active')->get();
    }

    public function getPatientDataExitedStatus()
    {
        return Patient::where('status', 'exited')->get();
    }
}