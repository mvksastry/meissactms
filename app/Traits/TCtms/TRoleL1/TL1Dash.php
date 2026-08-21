<?php

namespace App\Traits\TCtms\TRoleL1;

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

trait TL1Dash
{
    //  ------------Senior Reside --------------------//
    public function getAllOnBoardedPatientsForSeniorResident()
    {
        $status = ['draft'];
        return Patient::whereIn('status', $status)->get();
    }

    public function getAllPatientsForFollowUpForSeniorResident()
    {
        return Enrollment::Where('stage_code', '>=', 28)->get();
    }


}