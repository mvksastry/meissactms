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

    public function saveGenSummaryData($input)
    {

        $newGSdata = new GeneralSummary();

        $newGSdata->general_summary = $input['general_summary'];

        //--------X Common to all tables X-------------//
        $newGSdata->comment_entered_by = $input['comment_entered_by'];
        $newGSdata->entered_by = $input['entered_by'];
        $newGSdata->entry_date = $input['entry_date'];

        $newGSdata->save();

    }

}