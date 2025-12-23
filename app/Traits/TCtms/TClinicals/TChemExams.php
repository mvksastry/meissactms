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
use App\Models\Ctms\Clinicals\ChemicalExam;

use Illuminate\Support\Facades\Log;

trait TChemExams
{

    public function saveChemExamData($input, $passObj)
    {

        //$passObj = new ChemicalExam();

        $passObj->proteins = $input['proteins'];
        $passObj->sugar = $input['sugar'];
        $passObj->ketones = $input['ketones'];
        $passObj->procalcitonin = $input['procalcitonin'];
        $passObj->bile_salts = $input['bile_salts'];
        $passObj->bile_pigments = $input['bile_pigments'];
        $passObj->ce_report_file = $input['ce_report_file'];
        $passObj->ce_report_file_path = $input['ce_report_file_path'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();

    }
}