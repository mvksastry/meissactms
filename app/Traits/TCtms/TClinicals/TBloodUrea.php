<?php

namespace App\Traits\TCtms\TClinicals;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\BloodUrea;

use Illuminate\Support\Facades\Log;

trait TBloodUrea
{

    public function saveBloodUreaData($input, $passObj)
    {

        //$passObj = new BloodUrea();
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);
        
        $passObj->urea = $input['urea'];
        $passObj->blood_urea_nitrogen = $input['blood_urea_nitrogen'];
        $passObj->bubun_report_file = $input['bubun_report_file'];
        $passObj->bubun_report_file_path = $input['bubun_report_file_path'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();

    }
}