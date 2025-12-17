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
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;

use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;










//use App\Traits\Base;
//use App\Traits\TCommon\Notes;
//use App\Traits\TCommon\FileUploadHandler;
//use App\Traits\TElab\ResearchProjectPermission;
//
use Illuminate\Support\Facades\Log;

trait TPatientPersonalInfo
{
    //use Base;
    //use Notes;
    //use FileUploadHandler;

    public function savePatientInformation($input)
    {

        //dd($input);
        $newPatientInfo = new Patient();

        //$newPatientInfo->patient_id =  $input['inpatient_id']; 
        $newPatientInfo->patient_uuid = Str::uuid()->toString(); 
        $newPatientInfo->center_id =  $input['center_id'];

        $newPatientInfo->ctarm_id =  $input['ctarm_id'];
        $newPatientInfo->opd_id =  $input['opd_id'];
        $newPatientInfo->in_patient_id =  $input['in_patient_id'];
        $newPatientInfo->admission_date =  $input['admission_date'];
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

        //$newPatientInfo->verified_by = $input['verified_by'];
        //$newPatientInfo->verified_date = $input['verified_date'];
        //$newPatientInfo->sealed_by = $input['entry_sealed_by'];
        //$newPatientInfo->sealed_date = $input['entry_sealed_date'];
        //dd($newPatientInfo);

        try {
            $this->message_panel = true;
            $name = $newPatientInfo->name;
            $result = $newPatientInfo->save();
            //$name = "New Patient Name"; //for testing
            //$result = true; //for testing
            // Attempt to save the user
            $this->dispatch('resetPanelsForNewMessages');
            
            if ($result) {          
                $msg = 'New Patient ['.$name.'] saved successfully!';
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
                //set global patient uuid
                $this->patient_uuid = $newPatientInfo->patient_uuid; 
                //$this->opd_id = $input['opd_id'];
                //$this->in_patient_id =  $input['in_patient_id'];
                //$this->admission_date =  $input['admission_date'];

                //$this->form_header['patient_uuid'] = $newPatientInfo->patient_uuid;
                //$this->form_header['opd_id'] = $input['opd_id'];
                //$this->form_header['in_patient_id'] = $input['in_patient_id'];
                //$this->form_header['admission_date'] = $input['admission_date'];
                //$this->form_header['entered_by'] = Auth::user()->name;
                //$this->form_header = json_encode($this->form_header);
                //$this->dispatch('newFormHeadersGenerated', $this->patient_uuid);

                //make entries in all relevant tables.
                $newLS = new LifeStyle();
                $newLS->patient_uuid = $this->patient_uuid;
                $newLS->opd_id =  $input['opd_id'];
                $newLS->in_patient_id =  $input['in_patient_id'];
                $newLS->admission_date =  $input['admission_date'];
                $newLS->status = 'draft';
                $newLS->status_date = date('Y-m-d');
                $newLS->save();

                $newCD = new ClinicalData();
                $newCD->opd_id =  $input['opd_id'];
                $newCD->in_patient_id =  $input['in_patient_id'];
                $newCD->admission_date =  $input['admission_date'];
                $newCD->patient_uuid = $this->patient_uuid;
                $newCD->status = 'draft';
                $newCD->status_date = date('Y-m-d');
                $newCD->save();

                $newSE = new SensoryExamination();
                $newSE->patient_uuid = $this->patient_uuid;
                $newSE->opd_id =  $input['opd_id'];
                $newSE->in_patient_id =  $input['in_patient_id'];
                $newSE->admission_date =  $input['admission_date'];
                $newSE->status = 'draft';
                $newSE->status_date = date('Y-m-d');
                $newSE->save();

                $newMDT = new Mdtre();
                $newMDT->patient_uuid = $this->patient_uuid;
                $newMDT->opd_id =  $input['opd_id'];
                $newMDT->in_patient_id =  $input['in_patient_id'];
                $newMDT->admission_date =  $input['admission_date'];
                $newMDT->status = 'draft';
                $newMDT->status_date = date('Y-m-d');
                $newMDT->save();

                $newPfg = new PfirmannGrade();
                $newPfg->patient_uuid = $this->patient_uuid;
                $newPfg->opd_id =  $input['opd_id'];
                $newPfg->in_patient_id =  $input['in_patient_id'];
                $newPfg->admission_date =  $input['admission_date'];
                $newPfg->status = 'draft';
                $newPfg->status_date = date('Y-m-d');
                $newPfg->save();

                $newVasc = new VAScore();
                $newVasc->patient_uuid = $this->patient_uuid;
                $newVasc->opd_id =  $input['opd_id'];
                $newVasc->in_patient_id =  $input['in_patient_id'];
                $newVasc->admission_date =  $input['admission_date'];
                $newVasc->status = 'draft';
                $newVasc->status_date = date('Y-m-d');
                $newVasc->save();

                $newModq = new ModqScore();
                $newModq->patient_uuid = $this->patient_uuid;
                $newModq->opd_id =  $input['opd_id'];
                $newModq->in_patient_id =  $input['in_patient_id'];
                $newModq->admission_date =  $input['admission_date'];              
                $newModq->status = 'draft';
                $newModq->status_date = date('Y-m-d');
                $newModq->save();

                $newRMQ = new RMQReply();
                $newRMQ->patient_uuid = $this->patient_uuid;
                $newRMQ->opd_id =  $input['opd_id'];
                $newRMQ->in_patient_id =  $input['in_patient_id'];
                $newRMQ->admission_date =  $input['admission_date']; 
                $newRMQ->status = 'draft';
                $newRMQ->status_date = date('Y-m-d');
                $newRMQ->save();

                //$this->patient_uuid = "ea81b98a-05f9-4b28-be6b-1a8d72405fa4"; //for testing
                $this->dispatch('newPatientUuidGenerated', $this->patient_uuid);
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
