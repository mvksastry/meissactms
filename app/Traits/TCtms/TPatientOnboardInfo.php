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
use App\Models\Ctms\PatientEpoch;

use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;

use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;

use App\Models\Ctms\Clinicals\BloodRoutine;
use App\Models\Ctms\Clinicals\BloodSugar;
use App\Models\Ctms\Clinicals\BloodUrea;
use App\Models\Ctms\Clinicals\ChemicalExam;
use App\Models\Ctms\Clinicals\Creatinine;
use App\Models\Ctms\Clinicals\Crp;
use App\Models\Ctms\Clinicals\Electrolytes;
use App\Models\Ctms\Clinicals\GeneralSummary;
use App\Models\Ctms\Clinicals\Il6;
use App\Models\Ctms\Clinicals\LaboratoryExam;
use App\Models\Ctms\Clinicals\LiverFunction;
use App\Models\Ctms\Clinicals\MicroscopicExam;
use App\Models\Ctms\Clinicals\RenalFunction;
use App\Models\Ctms\Clinicals\UrineRoutine;

use App\Traits\TCtms\TPatientTimeline;

use Illuminate\Support\Facades\Log;

trait TPatientOnboardInfo
{
    //use Base;
    //use Notes;
    //use FileUploadHandler;
    use TPatientTimeline;

    public function savePatientOnBoardingInformation($input)
    {
        $event = "On-Boarding of New Patient";
        //dd($input);
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);


          $newPatientInfo = new Patient();
          $newPatientInfo->patient_uuid = Str::uuid()->toString(); 
          $newPatientInfo->center_id =  1;
          $newPatientInfo->ctarm_id =  1;

          $newPatientInfo->opd_id =  $input['opd_id'];
          $newPatientInfo->in_patient_id =  $input['in_patient_id'];
          $newPatientInfo->admission_date =  $input['admission_date'];

          //controls
          // above and below blocks are unchanged

          //now the 
          $newPatientInfo->ob_initiated_by = Auth::user()->name;
          $newPatientInfo->ob_initiated_role = Auth::user()->roles->pluck('name')[0];
          $newPatientInfo->ob_start_date = date('Y-m-d');

          $newPatientInfo->ob_approved_by = null;
          $newPatientInfo->ob_approval_role = null;
          $newPatientInfo->ob_approval_comment = null;
          $newPatientInfo->ob_status = 'pending';
          //----------------------------------------//
          //personal info
          $newPatientInfo->name =  $input['name'];
          $newPatientInfo->gender =  ucfirst($input['gender']);
          $newPatientInfo->date_of_birth =  $input['date_of_birth'];
          $newPatientInfo->age =  $input['age'];
          $newPatientInfo->primary_phone_number =  $input['primary_phone_number'];
          
          //status
          $newPatientInfo->status_code = 100; //very important, default null untill approval done
          $newPatientInfo->status = null;  //very important, default null untill approval done
          $newPatientInfo->status_date = date('Y-m-d');
          $newPatientInfo->appendComment('comment_entered_by', $input['comment_entered_by']);
          //$newPatientInfo->comment_entered_by = $input['comment_entered_by'];
          $newPatientInfo->entered_by = Auth::user()->name;
          $newPatientInfo->entry_date = date('Y-m-d');

          //dd($newPatientInfo);

        try {
            
            $name = $newPatientInfo->name;
            $result = $newPatientInfo->save();
            //$name = "New Patient Name"; //for testing, uncomment this, comment above two lines
            //$result = true;             //for testing
            //Attempt to save the user
            if ($result) { 

                $msg = 'New Patient ['.$name.'] saved successfully!';
                //$this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
                //set global patient uuid
                $tl_msg = $input['comment_entered_by'];
                $set = $this->savePatientTimeline($newPatientInfo->patient_uuid, $name, $event, $tl_msg);

                return $name;

            } else {
                $msg = 'New Patient ['.$name.'] could not be saved';
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for new patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        }


    }

}