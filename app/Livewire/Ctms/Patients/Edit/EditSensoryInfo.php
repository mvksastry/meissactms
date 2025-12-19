<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\SensoryExamination;

//forms
use App\Livewire\Forms\PatientSEForm;

//traits, facades

//logs
use Illuminate\Support\Facades\Log;

class EditSensoryInfo extends Component
{
    //Form bindings
    public PatientSEForm $form;

    //uuid of the patient
    public $uuid;
    public $se_info;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        $this->se_info = SensoryExamination::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->se_info);
        $this->form->entered_by = Auth::user()->name;
        $this->setSEDataForm($this->se_info);
        return view('livewire.ctms.patients.edit.edit-sensory-info');
    }

    public function setSEDataForm($se_info)
    {
        //dd($se_info);
        $this->form->opd_id = $se_info->opd_id;
        $this->form->in_patient_id = $se_info->in_patient_id;
        $this->form->admission_date = $se_info->admission_date;

        $this->form->S1 = $se_info->S1;
        $this->form->L1 = $se_info->L1;
        $this->form->L2 = $se_info->L2;
        $this->form->L3 = $se_info->L3;
        $this->form->L4 = $se_info->L4;
        $this->form->L5 = $se_info->L5;

        $this->form->comment_entered_by = $se_info->comment_entered_by;
        $this->form->entered_by = $se_info->entered_by;
        $this->form->entry_date = $se_info->entry_date;
        //dd($this->form);
    }

    public function fnEditSExamData()
    {
        $this->validate();
        $this->input = $this->form->all();
        //dd($this->input);       
        $this->message_panel = true;
        $name = $this->uuid;
        try {
            $result = SensoryExamination::where('patient_uuid', $this->uuid)->update($this->input);
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
