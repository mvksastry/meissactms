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
use App\Models\Ctms\Clinicals\Electrolytes;

use Illuminate\Support\Facades\Log;

trait TElectrolytes
{
    public function saveElectrolyteData($input, $passObj)
    {

        //$passObj = new Electrolytes();
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);
        
        $passObj->sodium = intval($input['sodium']);
        $passObj->potassium = intval($input['potassium']);
        $passObj->chloride = intval($input['chloride']);

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];

        $passObj->save();

    }
}