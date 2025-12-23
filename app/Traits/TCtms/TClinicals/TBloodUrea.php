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

    public function saveBloodUreaData($input)
    {

        $newBUdata = new BloodUrea();


        $newBUdata->urea = $input['urea'];
        $newBUdata->blood_urea_nitrogen = $input['blood_urea_nitrogen'];
        $newBUdata->bubun_report_file = $input['bubun_report_file'];
        $newBUdata->bubun_report_file_path = $input['bubun_report_file_path'];

        //--------X Common to all tables X-------------//
        $newBUdata->comment_entered_by = $input['comment_entered_by'];
        $newBUdata->entered_by = $input['entered_by'];
        $newBUdata->entry_date = $input['entry_date'];

        $newBUdata->save();

    }
}