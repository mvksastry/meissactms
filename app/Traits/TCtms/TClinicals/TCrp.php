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
use App\Models\Ctms\Clinicals\Crp;

use Illuminate\Support\Facades\Log;

trait TCrp
{

    public function saveCrpData($input)
    {

        $newCRPdata = new Crp();

        $newCRPdata->crp = $input['crp'];
        $newCRPdata->crp_report_file = $input['crp_report_file'];
        $newCRPdata->crp_report_file_path = $input['crp_report_file_path'];

        $newCRPdata->save();


    }

}