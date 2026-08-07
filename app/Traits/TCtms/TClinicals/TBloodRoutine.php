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
use App\Models\Ctms\Clinicals\BloodRoutine;

use Illuminate\Support\Facades\Log;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

trait TBloodRoutine
{

    public function saveBloodRoutineData($input, $passObj)
    {
        //$newBRdata = new BloodRoutine(); // not correct as first entry results in control
        //$passObj = BloodRoutine::where('patient_uuid', $patient_uuid)->first();
        //--------X Common to all tables X-------------//
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);

        //--------X Table content X-------------//
        $passObj->rbc = $input['rbc'];
        $passObj->hgb = $input['hgb'];
        $passObj->hct = $input['hct'];
        $passObj->mcv = $input['mcv'];
        $passObj->mch = $input['mch'];

        $passObj->mchc = $input['mchc'];
        $passObj->rdw_sd = $input['rdw_sd'];
        $passObj->rdw_cv = $input['rdw_cv'];
        $passObj->plt = $input['plt'];
        $passObj->pdw = $input['pdw'];

        $passObj->mpv = $input['mpv'];
        $passObj->plcr = $input['plcr'];
        $passObj->pct = $input['pct'];
        $passObj->wbc = $input['wbc'];

        $passObj->neutrophils_abs = $input['neutrophils_abs'];
        $passObj->neutrophils_percent = $input['neutrophils_percent'];
        $passObj->lymph_abs = $input['lymph_abs'];
        $passObj->lymph_percent = $input['lymph_percent'];

        $passObj->mono_abs = $input['mono_abs'];
        $passObj->mono_percent = $input['mono_percent'];
        $passObj->eo_abs = $input['eo_abs'];
        $passObj->eo_percent = $input['eo_percent'];

        $passObj->baso_abs = $input['baso_abs'];
        $passObj->baso_percent = $input['baso_percent'];
        $passObj->ig_abs = $input['ig_abs'];
        $passObj->ig_percent = $input['ig_percent'];

        $passObj->observations = $input['observations'];
        //$passObj->br_report_file = null;
        //$passObj->br_report_file_path = null;

        //--------X Common to all tables X-------------//
        $passObj->comment_entered_by = $input['comment_entered_by'];
        $passObj->entered_by = $input['entered_by'];
        $passObj->entry_date = $input['entry_date'];
        //dd($passObj);
        


                //dd($newPatientInfo);        
        try {
            $this->msg_panel = true;
            
            $result = $passObj->save(); //this updates single object.

            
            if ($result) { 
                return $result;
            } else {
                $msg = 'Patient Blood Routine Data could not be saved';
                $this->sysAlertDanger = $msg;
                LivewireAlert::title($msg)->warning()->asToast()->show();
                Log::channel('patient')->info($msg);
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for new patient while saving : '.$e->getMessage();
            LivewireAlert::title($msg)->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for while saving Blood Routine Data while saving : '.$e->getMessage();
            LivewireAlert::title($msg)->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        }





    }
}