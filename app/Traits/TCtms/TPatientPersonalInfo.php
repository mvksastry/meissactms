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

//traits
//use App\Traits\TCommon\Notes;
//use App\Traits\TCommon\FileUploadHandler;
//use App\Traits\TElab\ResearchProjectPermission;
use App\Traits\TCtms\TPatientTimeline;

use Illuminate\Support\Facades\Log;

trait TPatientPersonalInfo
{
    //use Base;
    //use Notes;
    //use FileUploadHandler;
    use TPatientTimeline;

    public function savePatientInformation($input)
    {
        //event for time line definition
        $event = "New Patient Entrollment";

        //dd($input);
        $input = array_map(function($value) 
        {
            return $value === "" ? NULL : $value;
        }, $input);

        if($this->patient_uuid == null)
        {
            $newPatientInfo = new Patient();
            $newPatientInfo->patient_uuid = Str::uuid()->toString(); 
        }
        else {
            $newPatientInfo = Patient::where('patient_uuid', $this->patient_uuid)->first();
            //dd($this->patient_uuid);
        }
        
        $newPatientInfo->center_id =  $input['center_id'];
        $newPatientInfo->ctarm_id =  $input['ctarm_id'];
        //controls
        $newPatientInfo->opd_id =  $input['opd_id'];
        $newPatientInfo->in_patient_id =  $input['in_patient_id'];
        $newPatientInfo->admission_date =  $input['admission_date'];
        //personal info
        $newPatientInfo->name =  $input['name'];
        $newPatientInfo->nick_name =  $input['nick_name'];
        $newPatientInfo->alias_name =  $input['alias_name'];
        $newPatientInfo->gender =  $input['gender'];
        $newPatientInfo->date_of_birth =  $input['date_of_birth'];
        $newPatientInfo->age =  $input['age'];
        $newPatientInfo->primary_phone_number =  $input['primary_phone_number'];
        $newPatientInfo->alternate_phone_number =  $input['alternate_phone_number'];

        $newPatientInfo->address =  $input['address'];
        $newPatientInfo->land_mark =  $input['land_mark'];
        $newPatientInfo->taluka_haveli =  $input['taluka_haveli'];
        $newPatientInfo->state =  $input['state'];

        $newPatientInfo->emergency_contact_name =  $input['emergency_contact_name'];
        $newPatientInfo->emergency_contact_phone =  $input['emergency_contact_phone'];
        $newPatientInfo->alternate_contact_name =  $input['alternate_contact_name']; 
        $newPatientInfo->alternate_contact_phone =  $input['alternate_contact_phone'];
        $newPatientInfo->height =  $input['height'];
        $newPatientInfo->height_unit = "centimeters"; 
        $newPatientInfo->weight =  $input['weight'];
        $newPatientInfo->weight_unit = "kg"; 
        $newPatientInfo->bmi =   $input['bmi'];
        $newPatientInfo->consent_status =  $input['consent_status'];
        $newPatientInfo->consent_date =  $input['consent_date'];
        $newPatientInfo->consent_av =  $input['consent_av'];
        $newPatientInfo->consent_approval_date =  $input['consent_approval_date'];
        $newPatientInfo->consent_approval_reference =  $input['consent_approval_reference'];
        $newPatientInfo->consent_approval_file =   $input['consent_approval_file'];
        $newPatientInfo->gen_surgical_info =  $input['gen_surgical_info'];
        $newPatientInfo->surgery_at_lumbar =  $input['surgery_at_lumbar'];
        $newPatientInfo->malignancies =  $input['malignancies'];
        $newPatientInfo->general_medical_history =  $input['general_medical_history'];
        $newPatientInfo->infections_suffered =  $input['infections_suffered'];
        $newPatientInfo->general_inflammatory_diseases =  $input['general_inflammatory_diseases'];
        $newPatientInfo->ankylosing_spondylosis =  $input['ankylosing_spondylosis'];
        $newPatientInfo->rheumatoid_arthritis =  $input['rheumatoid_arthritis'];
        $newPatientInfo->chronic_kidney_issues =  $input['chronic_kidney_issues'];
        $newPatientInfo->chronic_liver_issues =  $input['chronic_liver_issues'];
        $newPatientInfo->hiv =  $input['hiv'];
        $newPatientInfo->aids =  $input['aids'];
        $newPatientInfo->hepatitis_b =  $input['hepatitis_b'];
        $newPatientInfo->hepatitis_c =  $input['hepatitis_c'];
        $newPatientInfo->diabetes_mellitus_self =  $input['diabetes_mellitus_self'];
        $newPatientInfo->diabetes_mellitus_family =  $input['diabetes_mellitus_family'];
        $newPatientInfo->hypertension_self =  $input['hypertension_self'];
        $newPatientInfo->hypertension_family = $input['hypertension_family'];
        $newPatientInfo->ihd_self = $input['ihd_self'];
        $newPatientInfo->ihd_family = $input['ihd_family'];
        $newPatientInfo->paralysis_self = $input['paralysis_self'];
        $newPatientInfo->paralysis_family = $input['paralysis_family'];
        $newPatientInfo->consumption_non_tgp = $input['consumption_non_tgp'];
        $newPatientInfo->consumption_tobacco = $input['consumption_tobacco'];
        $newPatientInfo->consumption_gutka = $input['consumption_gutka'];
        $newPatientInfo->consumption_pan = $input['consumption_pan'];
        $newPatientInfo->anyother_habbits = $input['anyother_habbits'];
        $newPatientInfo->past_complaints = $input['past_complaints'];
        $newPatientInfo->present_complaints = $input['present_complaints'];
        $newPatientInfo->past_medications = $input['past_medications'];
        $newPatientInfo->present_medications = $input['present_medications'];
        $newPatientInfo->addictive_substance_use = $input['addictive_substance_use'];
        $newPatientInfo->non_addictive_substance_use = $input['non_addictive_substance_use'];
        $newPatientInfo->past_history = $input['past_history'];
        $newPatientInfo->notable_family_history = $input['notable_family_history'];
        $newPatientInfo->before_problem_occupation = $input['before_problem_occupation'];
        $newPatientInfo->general_habits = $input['general_habits'];

        $newPatientInfo->status = 'draft';
        $newPatientInfo->status_date = date('Y-m-d');

        $newPatientInfo->comment_entered_by = $input['comment_entered_by'];
        $newPatientInfo->entered_by = $input['entered_by'];
        $newPatientInfo->entry_date = date('Y-m-d');

        //dd($newPatientInfo);        
        try {
            $this->msg_panel = true;
            $name = $newPatientInfo->name;
            $result = $newPatientInfo->save();
            //$name = "New Patient Name"; //for testing
            //$result = true;             //for testing
            //Attempt to save the user
            $this->dispatch('resetPanelsForNewMessages');
            
            if ($result) { 

                $msg = 'New Patient ['.$name.'] saved successfully!';
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
                //set global patient uuid

                if($this->patient_uuid == null)
                {
                    $this->patient_uuid = $newPatientInfo->patient_uuid; 
                    //make entries through trait in all patient models
                    $setResult = $this->setDbEntriesPatientModels($this->patient_uuid, $input);
                    //$this->patient_uuid = "ea81b98a-05f9-4b28-be6b-1a8d72405fa4"; //for testing
                    $this->dispatch('newPatientUuidGenerated', $this->patient_uuid);
                    //timeline entry
                    $tl_msg = $input['comment_entered_by'];
                    $set = $this->savePatientTimeline($this->patient_uuid, $name, $event, $tl_msg);
                }
                return $result;

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
