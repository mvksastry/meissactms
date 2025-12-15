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
use App\Models\Ctms\LifeStyle;

use Illuminate\Support\Facades\Log;

trait TPatientLifeStyle
{
    //dd($input);

    public function savePatientLSInformation($input)
    {
      //dd($input);
        $patientInfo = Patient::where('patient_uuid', $this->patient_uuid)->first();

        $newLSinfo = new LifeStyle();

        $newLSinfo->patient_uuid = $this->patient_uuid; 

        $newLSinfo->opd_id = $input['opd_id'];
        $newLSinfo->in_patient_id = null;
        $newLSinfo->admission_date = $input['admission_date'];

        $newLSinfo->cross_leg_sitting = $input['cross_leg_sitting'];
        $newLSinfo->standing = $input['standing'];
        $newLSinfo->sitting = null;
        $newLSinfo->ls3 = $input['ls3'];
        $newLSinfo->ls4 = $input['ls4'];
        $newLSinfo->ls5 = $input['ls5'];
        $newLSinfo->ls6 = $input['ls6'];
        $newLSinfo->life_stryle_description = $input['life_style_description'];

        $newLSinfo->status = "draft";
        $newLSinfo->status_date = date('Y-m-d');

        $newLSinfo->comment_entered_by = $input['comment_entered_by'];
        $newLSinfo->entered_by = $input['entered_by'];
        $newLSinfo->entry_date = $input['entry_date'];
        //$newLSinfo->verified_by = $input['verified_by'];
        //$newLSinfo->verified_date = $input['verified_date'];
        //$newLSinfo->sealed_by = $input['entry_sealed_by'];
        //$newLSinfo->sealed_date = $input['entry_sealed_date'];
        //dd($newLSinfo);
        $result = $newLSinfo->save();
        return $result;
    }

}