<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\MdtreForm;

use App\Models\Ctms\Mdtre;

class EditMdtreInfo extends Component
{
    //Form bindings
    public MdtreForm $form;

    //uuid of the patient
    public $uuid;
    public $mdtre_info;

    public function render()
    {
        $this->mdtre_info = Mdtre::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->setMdtreData($this->mdtre_info);
        return view('livewire.ctms.patients.edit.edit-mdtre-info');
    }

    public function setMdtreData($mdtre_info)
    {
        //dd($mdtre_info);
        $this->form->opd_id = ($mdtre_info != null) ? $mdtre_info->opd_id : "";
        $this->form->in_patient_id = ($mdtre_info != null) ? $mdtre_info->in_patient_id : "";
        $this->form->admission_date = ($mdtre_info != null) ? $mdtre_info->admission_date : null;

        $this->form->hip_flex_adduction = ($mdtre_info != null) ? $mdtre_info->hip_flex_adduction : "";
        $this->form->knee_extension = ($mdtre_info != null) ? $mdtre_info->knee_extension : "";
        $this->form->ankle_dorsiflexion = ($mdtre_info != null) ? $mdtre_info->ankle_dorsiflexion : "";
        $this->form->ankle_dorsiflexion = ($mdtre_info != null) ? $mdtre_info->ankle_dorsiflexion : "";
        $this->form->decreased_patellar_reflex = ($mdtre_info != null) ? $mdtre_info->decreased_patellar_reflex : "";

        $this->form->extensor_hallucis_longus = ($mdtre_info != null) ? $mdtre_info->extensor_hallucis_longus : "";
        $this->form->hip_abduction = ($mdtre_info != null) ? $mdtre_info->hip_abduction : "";
        $this->form->ankle_plantar_flexion = ($mdtre_info != null) ? $mdtre_info->ankle_plantar_flexion : "";
        $this->form->dec_achilles_tendon_reflex = ($mdtre_info != null) ? $mdtre_info->dec_achilles_tendon_reflex : "";
        $this->form->straight_leg_raise = ($mdtre_info != null) ? $mdtre_info->straight_leg_raise : "";
        $this->form->contralateral_slr = ($mdtre_info != null) ? $mdtre_info->contralateral_slr : "";
        $this->form->femoral_nerve_stretch_test = ($mdtre_info != null) ? $mdtre_info->femoral_nerve_stretch_test : "";
 
        $this->form->trendelenburg_gait = ($mdtre_info != null) ? $mdtre_info->trendelenburg_gait : "";
        $this->form->antalgic_gait = ($mdtre_info != null) ? $mdtre_info->antalgic_gait : "";
        $this->form->list = ($mdtre_info != null) ? $mdtre_info->list : "";

        $this->form->comment_entered_by = ($mdtre_info != null) ? $mdtre_info->comment_entered_by : "";
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = ($mdtre_info != null) ? $mdtre_info->entry_date : null;
        //dd($this->form);
    }

    public function fnEditMDTREInfo()
    {
        $this->input = $this->form->all();
        //dd($this->input);
        $result = Mdtre::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
        
        $this->dispatch('close_mdtre_panel'); 
    }

}
