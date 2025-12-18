<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;


use File;

//Models
use App\Models\Ctms\ClinicalData;

use Illuminate\Support\Facades\Log;

trait TPatientClinicalData
{

    public function savePatientCIInformation($input)
    {
        //dd($input);
        //$newCIInfo = new ClinicalData();
        $newCIInfo = ClinicalData::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        //$newCIInfo->patient_uuid = $this->patient_uuid; 
//dd($newCIInfo);
        //$newCIInfo->opd_id = $input['opd_id'];
        //$newCIInfo->in_patient_id = $input['in_patient_id'];
        //$newCIInfo->admission_date = $input['admission_date'];

        $newCIInfo->o_e = $input['o_e'];
        $newCIInfo->pr = $input['pr'];
        $newCIInfo->temperature = $input['temperature'];
        $newCIInfo->bp_systolic = $input['bp_systolic'];
        $newCIInfo->bp_diastolic = $input['bp_diastolic'];
        $newCIInfo->cvs = $input['cvs'];
        $newCIInfo->p_a = $input['p_a'];
        $newCIInfo->cns = $input['cns'];

        $newCIInfo->cbc = $input['cbc'];
        $newCIInfo->esr = $input['esr'];
        $newCIInfo->crp = $input['crp'];
        $newCIInfo->rft = $input['rft'];
        $newCIInfo->lft = $input['lft'];
        $newCIInfo->clotting_time = $input['clotting_time'];
        $newCIInfo->bleeding_time = $input['bleeding_time'];
        $newCIInfo->prothrombin_time = $input['prothrombin_time'];
        $newCIInfo->procalcitonin = $input['procalcitonin'];
        $newCIInfo->laboratory_report_file = $input['laboratory_report_file'];

        //$newCIInfo->status = "draft";
        //$newCIInfo->status_date = date('Y-m-d');

        $newCIInfo->comment_entered_by = $input['comment_entered_by'];
        $newCIInfo->entered_by = $input['entered_by'];
        $newCIInfo->entry_date = $input['entry_date'];
        //$newCIInfo->verified_by = $input['verified_by'];
        //$newCIInfo->verified_date = $input['verified_date'];
        //$newCIInfo->sealed_by = $input['entry_sealed_by'];
        //$newCIInfo->sealed_date = $input['entry_sealed_date'];

        //dd($newCIInfo);
        $result = $newCIInfo->save();
        return $result;

    }

}