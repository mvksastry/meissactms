<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PatientCIForm;

use App\Models\Ctms\ClinicalData;

class EditClinicalInfo extends Component
{
    //Form bindings
    public PatientCIForm $form;

    //uuid of the patient
    public $uuid;
    public $clinical_info = null;

    public function render()
    {
        $this->clinical_info = ClinicalData::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->clinical_info);
        $this->setClinicalDataForm($this->clinical_info);
        return view('livewire.ctms.patients.edit.edit-clinical-info');
    }

    public function setClinicalDataForm($clinical_info)
    {
        $this->form->opd_id = ($clinical_info != null) ? $clinical_info->opd_id : "";
        $this->form->in_patient_id = ($clinical_info != null) ? $clinical_info->in_patient_id : "";
        $this->form->admission_date = ($clinical_info != null) ? $clinical_info->admission_date : "";

        $this->form->oande = ($clinical_info != null) ? $clinical_info->o_e : "";
        $this->form->pr = ($clinical_info != null) ? $clinical_info->pr : "";
        $this->form->temperature = ($clinical_info != null) ? $clinical_info->temperature : "";

        $this->form->bp_systolic = ($clinical_info != null) ? $clinical_info->bp_systolic : "";
        $this->form->bp_diastolic = ($clinical_info != null) ? $clinical_info->bp_diastolic : "";
        $this->form->cvs = ($clinical_info != null) ? $clinical_info->cvs : "";
        $this->form->panda = ($clinical_info != null) ? $clinical_info->p_a : "";
        $this->form->cns = ($clinical_info != null) ? $clinical_info->cns : "";
        $this->form->cbc = ($clinical_info != null) ? $clinical_info->cbc : "";
        $this->form->esr = ($clinical_info != null) ? $clinical_info->esr : "";
        $this->form->crp = ($clinical_info != null) ? $clinical_info->crp : "";
        $this->form->rft = ($clinical_info != null) ? $clinical_info->rft : "";
        $this->form->lft = ($clinical_info != null) ? $clinical_info->lft : "";
        
        $this->form->clotting_time = ($clinical_info != null) ? $clinical_info->clotting_time : "";
        $this->form->bleeding_time = ($clinical_info != null) ? $clinical_info->bleeding_time : "";
        $this->form->prothrombin_time = ($clinical_info != null) ? $clinical_info->prothrombin_time : "";
        $this->form->procalcitonin = ($clinical_info != null) ? $clinical_info->procalcitonin : "";
        $this->form->laboratory_report_file = ($clinical_info != null) ? $clinical_info->laboratory_report_file : "";
        
    }

    public function fnSaveEditedClinicalData()
    {      
        $this->input = $this->form->all();
        
        //dd($this->input);
        $result = ClinicalData::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
       //dd($this->input);             
    }
}