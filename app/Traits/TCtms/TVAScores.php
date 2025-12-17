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
use App\Models\Ctms\VAScore;

use Illuminate\Support\Facades\Log;

trait TVAScores
{

    public function saveVAScores($input)
    {
       // dd("reached trait");
        //$nVAScores = new VAScore();
        $nVAScores = VAScore::where('patient_uuid', $this->patient_uuid)->where('status', 'draft')->first();
        //$nVAScores->patient_uuid = $this->patient_uuid; 
        //dd($nVAScores);
        //$nVAScores->opd_id =  $input['opd_id'];
        //$nVAScores->in_patient_id =  $input['in_patient_id'];
        //$nVAScores->admission_date =  $input['admission_date'];

        $nVAScores->intensity = $input['intensity'];
        $nVAScores->location = $input['location'];
        $nVAScores->onset = $input['onset'];
        $nVAScores->duration = $input['duration'];
        $nVAScores->variation = $input['variation'];
        $nVAScores->quality = $input['quality'];

        $nVAScores->status = "draft";
        $nVAScores->status_date = date('Y-m-d');

        $nVAScores->comment_entered_by = $input['comment_entered_by'];
        $nVAScores->entered_by = $input['entered_by'];
        $nVAScores->entry_date = $input['entry_date'];
        //$nVAScores->verified_by = $input['verified_by'];
        //$nVAScores->verified_date = $input['verified_date'];
        //$nVAScores->sealed_by = $input['entry_sealed_by'];
        //$nVAScores->sealed_date = $input['entry_sealed_date'];
        //dd($nVAScores);
        $result = $nVAScores->save();
        return $result;
    }
}