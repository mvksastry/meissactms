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
use App\Models\Ctms\Clinicals\LaboratoryExam;

use Illuminate\Support\Facades\Log;

trait TLaboratoryExams
{
    public function saveLaboratoryExamData($input)
    {

        $newLEdata = new LaboratoryExam();

        $newLEdata->esr = $input['esr'];
        $newLEdata->pt_patient = $input['pt_patient'];
        $newLEdata->pt_control = $input['pt_control'];
        $newLEdata->inr = $input['inr'];
        $newLEdata->isi = $input['isi'];

        $newLEdata->esr_report_file = $input['esr_report_file'];
        $newLEdata->esr_report_file_path = $input['esr_report_file_path'];
        $newLEdata->pt_report_file = $input['pt_report_file'];
        $newLEdata->pt_report_file_path = $input['pt_report_file_path'];

        $newLEdata->save();
    }

}