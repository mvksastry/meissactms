<?php

namespace App\Traits\TCtms\TClinicals;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Clinicals\Il6;

use Illuminate\Support\Facades\Log;

trait TIl6
{

    public function saveIl6Data($input, $passObj)
    {
        //$passObj = new Il6();
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);
        
        $passObj->il6 = $input['il6'];
        $passObj->il6_report_file = $input['il6_report_file'];
        $passObj->il6_report_file_path = $input['il6_report_file_path'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();


    }
}