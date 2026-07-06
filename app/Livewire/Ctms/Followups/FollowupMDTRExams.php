<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\MdtreForm;

//Traits
use App\Traits\TCtms\TPatientMdtreData;

//logs
use Illuminate\Support\Facades\Log;

class FollowupMDTRExams extends Component
{
    //triats
    use TPatientMdtreData;
    //Form bindings
    public MdtreForm $form;
    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //MDTRE variables
    public $hip_flexion_adduction, $knee_extension, $ankle_dorsiflexion, $decreased_patellar_reflex, $extensor_hallucis_longus; 
    public $hip_abduction, $ankle_plantar_flexion, $decreased_achilles_tendon_reflex, $straight_leg_raise, $contralateral_slr;
    public $femoral_nerve_stretch_test, $trendelenburg_gait, $antalgic_gait, $list;


    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSaveMDTREInfo()
    {
        $this->input = $this->form->all();
        //dd($this->input); //
        $result = $this->saveFollowupMDTREInformation($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved MDTRE data');
        //dd($result); //
    }

    public function saveFollowupMDTREInformation($input)
    {
      //$newMdtreInfos = new Mdtre();
      $newMdtreInfos = new Mdtre();
      $newMdtreInfos->patient_uuid = $this->patient_uuid; 
      //dd($newMdtreInfos);
      $newMdtreInfos->opd_id =  $input['opd_id'];
      $newMdtreInfos->in_patient_id =  $input['in_patient_id'];
      $newMdtreInfos->admission_date =  $input['admission_date'];

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

      $newMdtreInfos->status = "follow-up-".$this->data_type;
      $newMdtreInfos->status_date = date('Y-m-d');

      $newMdtreInfos->comment_entered_by = $input['comment_entered_by'];
      $newMdtreInfos->entered_by = $input['entered_by'];
      $newMdtreInfos->entry_date = $input['entry_date'];
      //$newMdtreInfos->verified_by = $input['verified_by'];
      //$newMdtreInfos->verified_date = $input['verified_date'];
      //$newMdtreInfos->sealed_by = $input['entry_sealed_by'];
      //$newMdtreInfos->sealed_date = $input['entry_sealed_date'];

      //dd($newMdtreInfos);

      $result = $newMdtreInfos->save();

      return $result;
    }
}
