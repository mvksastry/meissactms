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
use App\Models\Ctms\Clinicals\Creatinine;

use Illuminate\Support\Facades\Log;

trait TCreatinine
{

    public function saveCreatinineData($input)
    {

        $newCreatinedata = new Creatinine();

        $newCreatinedata->serum_creatinine = $input['serum_creatinine'];
        $newCreatinedata->creatine_report_file = $input['creatine_report_file'];
        $newCreatinedata->creatine_report_file_path = $input['creatine_report_file_path'];

        $newCreatinedata->save();

    }
}