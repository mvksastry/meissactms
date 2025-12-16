<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PatientSEForm;

use App\Models\Ctms\ClinicalData;

use App\Models\Ctms\SensoryExamination;

class EditSensoryInfo extends Component
{
    //Form bindings
    public PatientSEForm $form;

    //uuid of the patient
    public $uuid;
    public $se_info;

    public function render()
    {
        $this->se_info = SensoryExamination::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->se_info);
        $this->setSEDataForm($this->se_info);
        return view('livewire.ctms.patients.edit.edit-sensory-info');
    }

    public function setSEDataForm($se_info)
    {
        //dd($se_info);
        $this->form->opd_id = ($se_info != null) ? $se_info->opd_id : "";
        $this->form->in_patient_id = ($se_info != null) ? $se_info->in_patient_id : "";
        $this->form->admission_date = ($se_info != null) ? $se_info->admission_date : null;

        $this->form->S1 = ($se_info != null) ? $se_info->S1 : "";
        $this->form->L1 = ($se_info != null) ? $se_info->L1 : "";
        $this->form->L2 = ($se_info != null) ? $se_info->L2 : "";
        $this->form->L3 = ($se_info != null) ? $se_info->L3 : "";
        $this->form->L4 = ($se_info != null) ? $se_info->L4 : "";
        $this->form->L5 = ($se_info != null) ? $se_info->L5 : "";

        $this->form->comment_entered_by = ($se_info != null) ? $se_info->comment_entered_by : "";
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = ($se_info != null) ? $se_info->entry_date : null;
        //dd($this->form);
    }

    public function fnEditSExamData()
    {
        $this->input = $this->form->all();
        
        $result = SensoryExamination::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
        $this->dispatch('close_se_panel'); 
    }
}
