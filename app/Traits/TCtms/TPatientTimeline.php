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
use App\Models\Ctms\Patient;
use App\Models\Ctms\PatientEpoch;

//traits
//use App\Traits\TCommon\Notes;
//use App\Traits\TCommon\FileUploadHandler;
//use App\Traits\TElab\ResearchProjectPermission;
//
use Illuminate\Support\Facades\Log;

trait TPatientTimeline
{
    //use Base;
    //use Notes;
    //use FileUploadHandler;

    public function savePatientTimeline($patient_uuid, $name, $event, $tl_msg)
    {
        //dd($input);
        $nTLine = new PatientEpoch();
 
        $nTLine->patient_uuid = $patient_uuid; 

        $nTLine->event =  $event;
        $nTLine->event_date =  date('Y-m-d H:i:s');
        $nTLine->event_author =  Auth::user()->name;
        //message
        $nTLine->author_message =  $tl_msg;
        //personal info
        $nTLine->reply_message =  null;
        $nTLine->reply_author =  null;
        $nTLine->reply_date =  null;
        
        $nTLine->status = 'active';
        //dd($nTLine);        
        try {
            $result = $nTLine->save();
            //Attempt to save the user            
            if ($result) { 
                Log::channel('patient')->info($tl_msg);
                return $result;
            } else {
                $msg = 'Patient ['.$name.'] timeline could not be saved';
                Log::channel('patient')->info($msg);
            }

            } catch (QueryException $e) {
                // Handles database-related errors (e.g., duplicate email)
                $msg = 'Database error for patient ['.$name.'] while saving : '.$e->getMessage();
                Log::channel('patient')->info($msg);
            } catch (\Exception $e) {
                // Handles any other general exceptions
                $msg = 'Unexpected error for patient ['.$name.'] while saving : '.$e->getMessage();
                Log::channel('patient')->info($msg);
            }
    }
}