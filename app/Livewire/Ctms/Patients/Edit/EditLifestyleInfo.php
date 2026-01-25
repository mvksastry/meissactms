<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\LifeStyle;

//forms
use App\Livewire\Forms\PatientLSForm;

//traits, facades

//logs
use Illuminate\Support\Facades\Log;

class EditLifestyleInfo extends Component
{
    //Form bindings
    public PatientLSForm $form;

    //uuid of the patient
    public $uuid;
    public $ls_info;
    public $empty_result;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        $this->ls_info = LifeStyle::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        //dd($this->ls_info);
        $this->form->entered_by = Auth::user()->name;
        //$this->empty_result = true;
        $this->setFormValues($this->ls_info);
        return view('livewire.ctms.patients.edit.edit-lifestyle-info');
    }

    public function setFormValues($ls_info)
    {
        //dd($ls_info);
        $this->form->opd_id = $ls_info->opd_id;
        $this->form->in_patient_id = $ls_info->in_patient_id;
        $this->form->admission_date = $ls_info->admission_date;
        $this->form->cross_leg_sitting = $ls_info->cross_leg_sitting;
        $this->form->standing = $ls_info->standing;
        $this->form->sitting = $ls_info->sitting;
        $this->form->ls3 = $ls_info->ls3;
        $this->form->ls4 = $ls_info->ls4;
        $this->form->ls5 = $ls_info->ls5;
        $this->form->ls6 = $ls_info->ls6;
        $this->form->life_style_description = $ls_info->life_style_description;
        $this->form->status = $ls_info->status;
        $this->form->status_date = $ls_info->status_date;
        $this->form->comment_entered_by = $ls_info->comment_entered_by;
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSaveEditedLSInfo()
    {   $this->validate();
        $this->input = $this->form->all();
        //dd($this->input);
        $this->msg_panel = true;
        $name = $this->uuid;
        try {
            $result = LifeStyle::where('patient_uuid', $this->uuid)->update($this->input);
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
