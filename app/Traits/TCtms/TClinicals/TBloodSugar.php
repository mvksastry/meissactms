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
use App\Models\Ctms\Clinicals\BloodSugar;

use Illuminate\Support\Facades\Log;

trait TBloodSugar
{
    public function saveBloodSugarData($input, $passObj)
    {

        //$passObj = new BloodSugar();
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);
        
        $passObj->fasting = $input['fasting'];
        $passObj->post_prandial = $input['post_prandial'];
        $passObj->random = $input['random'];
        $passObj->bs_report_file = $input['bllodsugar_report_file'];
        $passObj->bs_report_file_path = null;

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();
    }
}