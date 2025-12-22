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
use App\Models\Ctms\Clinicals\BloodSugar;

use Illuminate\Support\Facades\Log;

trait TBloodSugar
{

    public function saveBloodSugarData($input)
    {

        $newBSdata = new BloodSugar();

        $newBSdata->fasting = $input['fasting'];
        $newBSdata->post_prandial = $input['post_prandial'];
        $newBSdata->random = $input['random'];
        $newBSdata->bs_report_file = $input['bs_report_file'];
        $newBSdata->bs_report_file_path = $input['bs_report_file_path'];

        $newBSdata->save();
    }
}