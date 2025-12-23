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

    public function saveLiverFunctionData($input, $passObj)
    {

        //$passObj = new LiverFunction();

        $passObj->serum_total_protein = intval($input['serum_total_protein']);
        $passObj->serum_albumin = intval($input['serum_albumin']);
        $passObj->globulin = intval($input['globulin']);
        $passObj->ag_ratio = intval($input['ag_ratio']);
        $passObj->total_bilirubin = intval($input['total_bilirubin']);

        $passObj->direct_bilirubin = intval($input['direct_bilirubin']);
        $passObj->indirect_bilirubin = intval($input['indirect_bilirubin']);
        $passObj->sgot = intval($input['sgot']);
        $passObj->sgpt = intval($input['sgpt']);
        $passObj->alkaline_phosphatase = intval($input['alkaline_phosphatase']);

        $passObj->observations = null;
        $passObj->lft_report_file = $input['lft_report_file'];
        $passObj->lft_report_file_path = $input['lft_report_file_path'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];


        $passObj->save();
    }

}