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
use App\Models\Ctms\Mdtre;

trait TPatientMdtreData
{
    //use Base;
    //use Notes;
    //use FileUploadHandler;

    public function saveMDTREInformation($input)
    {
      $newMdtreInfos = new Mdtre();

      $newMdtreInfos->patient_uuid = Str::uuid()->toString(); 
      $newMdtreInfos->center_id =  1; //$input['center_id'];
      $newMdtreInfos->ctarm_id =  1; //$input['ctarm_id'];
      $newMdtreInfos->opd_id =  $input['opd_id'];
      $newMdtreInfos->in_patient_id =  $input['in_patient_id'];
      $newMdtreInfos->admission_date =  $input['admission_date'];
      $newMdtreInfos->aadhar_id = null;
      $newMdtreInfos->pan_num = null;
      $newMdtreInfos->other_id = null;

      $newMdtreInfos->hip_flex_adduction = $input['hip_flex_adduction'];
      $newMdtreInfos->knee_extension = $input['knee_extension'];
      $newMdtreInfos->ankle_dorsiflexion = $input['ankle_dorsiflexion'];
      $newMdtreInfos->decreased_patellar_reflex = $input['decreased_patellar_reflex'];
      $newMdtreInfos->extensor_hallucis_longus = $input['extensor_hallucis_longus'];
      $newMdtreInfos->hip_abduction = $input['hip_abduction'];
      $newMdtreInfos->ankle_plantar_flexion = $input['ankle_plantar_flexion'];
      $newMdtreInfos->dec_achilles_tendon_reflex = $input['dec_achilles_tendon_reflex'];
      $newMdtreInfos->straight_leg_raise = $input['straight_leg_raise'];
      $newMdtreInfos->contralateral_slr = $input['contralateral_slr'];
      $newMdtreInfos->femoral_nerve_stretch_test = $input['femoral_nerve_stretch_test'];
      $newMdtreInfos->trendelenburg_gait = $input['trendelenburg_gait'];
      $newMdtreInfos->antalgic_gait = $input['antalgic_gait'];
      $newMdtreInfos->list = $input['list'];

      $newMdtreInfos->entered_by = $input['entered_by'];
      $newMdtreInfos->entry_date = $input['entry_date'];
      $newMdtreInfos->verified_by = $input['verified_by'];
      $newMdtreInfos->verified_date = $input['verified_date'];
      $newMdtreInfos->sealed_by = $input['entry_sealed_by'];
      $newMdtreInfos->sealed_date = $input['entry_sealed_date'];

      //dd($newMdtreInfos);

      $result = $newMdtreInfos->save();

      return $result;

    }
}