<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\ClinicalData;

//forms
use App\Livewire\Forms\PatientCIForm;

//traits, facades

//logs
use Illuminate\Support\Facades\Log;

class EditClinicalInfo extends Component
{
    //Form bindings
    public PatientCIForm $form;

    //uuid of the patient
    public $uuid;
    public $clinical_info = null;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        $this->clinical_info = ClinicalData::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->clinical_info);
        $this->form->entered_by = Auth::user()->name;
        $this->setClinicalDataForm($this->clinical_info);
        return view('livewire.ctms.patients.edit.edit-clinical-info');
    }

    public function setClinicalDataForm($clinical_info)
    {
        $this->form->opd_id = $clinical_info->opd_id;
        $this->form->in_patient_id = $clinical_info->in_patient_id;
        $this->form->admission_date = $clinical_info->admission_date;

        $this->form->o_e = $clinical_info->o_e;
        $this->form->pr = $clinical_info->pr;
        $this->form->temperature = $clinical_info->temperature;

        $this->form->bp_systolic = $clinical_info->bp_systolic;
        $this->form->bp_diastolic = $clinical_info->bp_diastolic;
        $this->form->cvs = $clinical_info->cvs;
        $this->form->p_a = $clinical_info->p_a;
        $this->form->cns = $clinical_info->cns;
        $this->form->cbc = $clinical_info->cbc;
        $this->form->esr = $clinical_info->esr;
        $this->form->crp = $clinical_info->crp;
        $this->form->rft = $clinical_info->rft;
        $this->form->lft = $clinical_info->lft;
        
        $this->form->clotting_time = $clinical_info->clotting_time;
        $this->form->bleeding_time = $clinical_info->bleeding_time;
        $this->form->prothrombin_time = $clinical_info->prothrombin_time;
        $this->form->procalcitonin = $clinical_info->procalcitonin;
        $this->form->laboratory_report_file = $clinical_info->laboratory_report_file;
        
    }

    public function fnSaveEditedClinicalData()
    {   $this->message_panel = false;
        $this->validate(); 
        $this->input = $this->form->all();

        //dd($this->input);       
        $this->message_panel = true;
        $name = $this->uuid;
        try {
            $result = ClinicalData::where('patient_uuid', $this->uuid)->update($this->input);
            if ($result) {        
                $msg = 'Patient ['.$name.'] update successfull!';  
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
            } else {
                $msg = 'Patient ['.$name.'] could not be saved';
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for patient ['.$name.'] while saving : '.$e->getMessage();
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