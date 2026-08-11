<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\PfirmannGrade;

//forms
use App\Livewire\Forms\PfirmannForm;

//traits, facades
//traits
use App\Traits\Base;
//logs
use Illuminate\Support\Facades\Log;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class EditPfirmannInfo extends Component
{
    use Base;

    //Form bindings
    public PfirmannForm $form;

    //uuid of the patient
    public $uuid;
    public $pfirmg_info;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
       // $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        /*
        if( Auth::user()->hasAnyRole(['junior_resident', 'senior_resident']) )
        {
            $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        }
        if( Auth::user()->hasAnyRole(['ctms_manager','clinical_manager']) )
        {
            $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('status', 'verified')->first();
        }
        if( Auth::user()->hasAnyRole(['ctms_incharge']) )
        {
            $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('status', 'approved')->first();
        }
        if( Auth::user()->hasAnyRole(['director']) )
        {
            $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->first();
        }
        */
        $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('data_type', 'pre-enrollment')->first();
        $this->form->entered_by = Auth::user()->name;
        $this->setMdtreData($this->pfirmg_info);
        return view('livewire.ctms.patients.edit.edit-pfirmann-info');
    }

    public function setMdtreData($pfirmg_info)
    {
        //dd($pfirmg_info);
        $this->form->opd_id = $pfirmg_info->opd_id;
        $this->form->in_patient_id = $pfirmg_info->in_patient_id;
        $this->form->admission_date = $pfirmg_info->admission_date;

        $this->form->modified_pfirman_grade = $pfirmg_info->modified_pfirman_grade;

        $this->form->comment_entered_by = $pfirmg_info->comment_entered_by;
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
        //dd($this->form);
    }

    public function fnEditPfirmannGrade()
    {
        $this->msg_panel = false;
        $this->form->validate(); 
        $this->input = $this->form->all();
        $this->input = $this->sanitizeInput($this->input);
        //dd($this->input);
        $this->msg_panel = true;
        $name = $this->uuid;
        try {
            $result = PfirmannGrade::where('patient_uuid', $this->uuid)->update($this->input);
            if ($result) {        
                $msg = 'Pfirmann Score For Patient ['.$name.'] update successfull!';  
                LivewireAlert::title('Patient PFirmanns info updated')->success()->asToast()->show();
                //$this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
            } else {
                $msg = 'Pfirmann Score For Patient ['.$name.'] could not be saved';
                LivewireAlert::title('Patient PFirmanns info failed')->warning()->asToast()->show();
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error: Pfirmann Score For Patient ['.$name.'] while saving : '.$e->getMessage();
            LivewireAlert::title('Patient PFirmanns info failed')->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error: Pfirmann Score For Patient ['.$name.'] while saving : '.$e->getMessage();
            LivewireAlert::title('Patient PFirmanns info failed')->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } 
    }
}
