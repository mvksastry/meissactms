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
use App\Models\Ctms\PfirmannGrade;

use Illuminate\Support\Facades\Log;

trait TPatientPfirmannData
{

    public function savePfirmannGrade($input)
    {
       // dd("reached trait");
        $nPfirmannScore = new PfirmannGrade();

        $nPfirmannScore->patient_uuid = $this->patient_uuid; 

        $nPfirmannScore->opd_id =  $input['opd_id'];
        $nPfirmannScore->in_patient_id =  $input['in_patient_id'];
        $nPfirmannScore->admission_date =  $input['admission_date'];

        $nPfirmannScore->modified_pfirman_grade = $input['modified_pfirmans_grade'];

        $nPfirmannScore->status = "draft";
        $nPfirmannScore->status_date = date('Y-m-d');

        $nPfirmannScore->comment_entered_by = $input['comment_entered_by'];
        $nPfirmannScore->entered_by = $input['entered_by'];
        $nPfirmannScore->entry_date = $input['entry_date'];
        //$nPfirmannScore->verified_by = $input['verified_by'];
        //$nPfirmannScore->verified_date = $input['verified_date'];
        //$nPfirmannScore->sealed_by = $input['entry_sealed_by'];
        //$nPfirmannScore->sealed_date = $input['entry_sealed_date'];

        //dd($nPfirmannScore);
        $result = $nPfirmannScore->save();
        return $result;

    }

}