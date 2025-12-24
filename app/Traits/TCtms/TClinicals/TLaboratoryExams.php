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
use App\Models\Ctms\Clinicals\LaboratoryExam;

use Illuminate\Support\Facades\Log;

trait TLaboratoryExams
{
    public function saveLaboratoryExamData($input, $passObj)
    {

        //$passObj = new LaboratoryExam();
       // dd($input);
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input); // array_map should walk through $array

        //dd($input);
        $passObj->esr = $input['esr'];
        $passObj->pt_patient = $input['pt_patient'];
        $passObj->pt_control = $input['pt_control'];
        $passObj->inr = $input['inr'];
        $passObj->isi = $input['isi'];

        $passObj->esr_report_file = null;
        $passObj->esr_report_file_path = null;
        $passObj->pt_report_file = null;
        $passObj->pt_report_file_path = null;

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];


        $passObj->save();
    }

}