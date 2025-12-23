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
use App\Models\Ctms\Clinicals\GeneralSummary;

use Illuminate\Support\Facades\Log;

trait TGeneralSummary
{

    public function saveGenSummaryData($input, $passObj)
    {

        //$passObj = new GeneralSummary();

        $passObj->general_summary = $input['general_summary'];

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();

    }

}