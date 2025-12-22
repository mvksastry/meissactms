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
use App\Models\Ctms\Clinicals\ChemicalExam;

use Illuminate\Support\Facades\Log;

trait TChemExams
{

    public function saveChemExamData($input)
    {

        $newCEdata = new ChemicalExam();

        $newCEdata->proteins = $input['proteins'];
        $newCEdata->sugar = $input['sugar'];
        $newCEdata->ketones = $input['ketones'];
        $newCEdata->procalcitonin = $input['procalcitonin'];
        $newCEdata->bile_salts = $input['bile_salts'];
        $newCEdata->bile_pigments = $input['bile_pigments'];
        $newCEdata->ce_report_file = $input['ce_report_file'];
        $newCEdata->ce_report_file_path = $input['ce_report_file_path'];


        $newCEdata->save();

    }
}