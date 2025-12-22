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
use App\Models\Ctms\Clinicals\BloodRoutine;

use Illuminate\Support\Facades\Log;

trait TBloodRoutine
{

    public function saveBloodRoutineData($input)
    {
        $newBRdata = new BloodRoutine();

        $newBRdata->rbc = $input['rbc'];
        $newBRdata->hgb = $input['hgb'];
        $newBRdata->hct = $input['hct'];
        $newBRdata->mcv = $input['mcv'];
        $newBRdata->mch = $input['mch'];

        $newBRdata->mchc = $input['mchc'];
        $newBRdata->rdw_sd = $input['rdw_sd'];
        $newBRdata->rdw_cv = $input['rdw_cv'];
        $newBRdata->plt = $input['plt'];
        $newBRdata->pdw = $input['pdw'];

        $newBRdata->mpv = $input['mpv'];
        $newBRdata->plcr = $input['plcr'];
        $newBRdata->pct = $input['pct'];
        $newBRdata->wbc = $input['wbc'];

        $newBRdata->neutrophils_abs = $input['neutrophils_abs'];
        $newBRdata->neutrophils_percent = $input['neutrophils_percent'];
        $newBRdata->lymph_abs = $input['lymph_abs'];
        $newBRdata->lymph_percent = $input['lymph_percent'];

        $newBRdata->mono_abcs = $input['mono_abcs'];
        $newBRdata->mono_percent = $input['mono_percent'];
        $newBRdata->eo_abs = $input['eo_abs'];
        $newBRdata->eo_percent = $input['eo_percent'];

        $newBRdata->baso_abs = $input['baso_abs'];
        $newBRdata->baso_percent = $input['baso_percent'];
        $newBRdata->ig_abs = $input['ig_abs'];
        $newBRdata->ig_percent = $input['ig_percent'];

        $newBRdata->observations = $input['observations'];
        $newBRdata->br_report_file = $input['br_report_file'];
        $newBRdata->br_report_file_path = $input['br_report_file_path'];

        $newBRdata->save();
    }
}