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
use App\Models\Ctms\Clinicals\Creatinine;

use Illuminate\Support\Facades\Log;

trait TCreatinine
{

    public function saveCreatinineData($input, $passObj)
    {

        //$passObj = new Creatinine();
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);
        
        $passObj->serum_creatinine = $input['serum_creatinine'];
        $passObj->creatine_report_file = $input['creatine_report_file'];
        $passObj->creatine_report_file_path = $input['creatine_report_file_path'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();

    }
}