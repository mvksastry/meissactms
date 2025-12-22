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
use App\Models\Ctms\Clinicals\LiverFunction;

use Illuminate\Support\Facades\Log;

trait TLiverFunctions
{

    public function saveLiverFunctionData($input)
    {

        $newLFdata = new LiverFunction();

        $newLFdata->serum_total_protein = $input['serum_total_protein'];
        $newLFdata->serum_albumin = $input['serum_albumin'];
        $newLFdata->globulin = $input['globulin'];
        $newLFdata->ag_ratio = $input['ag_ratio'];
        $newLFdata->total_bilirubin = $input['total_bilirubin'];

        $newLFdata->direct_bilirubin = $input['direct_bilirubin'];
        $newLFdata->indirect_bilirubin = $input['indirect_bilirubin'];
        $newLFdata->sgot = $input['sgot'];
        $newLFdata->sgpt = $input['sgpt'];
        $newLFdata->alkaline_phosphatase = $input['alkaline_phosphatase'];

        $newLFdata->observations = $input['observations'];
        $newLFdata->lft_report_file = $input['lft_report_file'];
        $newLFdata->lft_report_file_path = $input['lft_report_file_path'];


        $newLFdata->save();
    }

}