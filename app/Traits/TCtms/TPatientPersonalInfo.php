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

//use App\Traits\Base;
//use App\Traits\TCommon\Notes;
//use App\Traits\TCommon\FileUploadHandler;
//use App\Traits\TElab\ResearchProjectPermission;

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

        $newPatientInfo->entered_by = $input['entered_by'];
        $newPatientInfo->entry_date = $input['entry_date'];
        $newPatientInfo->verified_by = $input['verified_by'];
        $newPatientInfo->verified_date = $input['verified_date'];
        $newPatientInfo->sealed_by = $input['entry_sealed_by'];
        $newPatientInfo->sealed_date = $input['entry_sealed_date'];
        dd($newPatientInfo);
        $result = $newPatientInfo->save();
        return $result;
    }

}
