<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\VAScore;

//forms
use App\Livewire\Forms\PatientVAScoreForm;

//traits, facades
use App\Traits\Base;
//logs
use Illuminate\Support\Facades\Log;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class EditVisualAnalogScore extends Component
{
    use Base;
    
    //Form bindings
    public PatientVAScoreForm $form;

    //uuid of the patient
    public $uuid;
    public $vascore;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public $vas_scale, $fpr_scale, $quality;

    public function render()
    {
        //$this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        /*
        if( Auth::user()->hasAnyRole(['junior_resident', 'senior_resident']) )
        {
            $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        }
        if( Auth::user()->hasAnyRole(['ctms_manager','clinical_manager']) )
        {
            $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'verified')->first();
        }
        if( Auth::user()->hasAnyRole(['ctms_incharge']) )
        {
            $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'approved')->first();
        }
        if( Auth::user()->hasAnyRole(['director']) )
        {
            $this->vascore = VAScore::where('patient_uuid', $this->uuid)->first();
        }
        */
        $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('data_type', 'pre-enrollment')->first();
        $this->form->entered_by = Auth::user()->name;
        $this->setVAscoreData($this->vascore);
        return view('livewire.ctms.patients.edit.edit-visual-analog-score');
    }

    public function setVAscoreData($vascore)
    {
        //dd($vascore);
        $this->form->opd_id = $vascore->opd_id;
        $this->form->in_patient_id = $vascore->in_patient_id;
        $this->form->admission_date = $vascore->admission_date;

        //$this->form->intensity = $vascore->intensity;
        //$this->form->location = $vascore->location;
        //$this->form->onset = $vascore->onset;
       // $this->form->duration = $vascore->duration;
        //$this->form->variation = $vascore->variation;
        $this->form->quality = $vascore->quality;
        $this->form->vas_scale = $vascore->vas_scale;
        $this->form->fpr_scale = $vascore->fpr_scale;

        $this->form->comment_entered_by = $vascore->comment_entered_by;
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
        //dd($this->form);
    }

    public function fnEditVAscoreData()
    {
        $this->msg_panel = false;
        $this->form->validate(); 
        $this->input = $this->form->all();
        $this->input = $this->sanitizeInput($this->input);
        //dd($this->uuid, $this->input);
        $this->msg_panel = true;
        $name = $this->uuid;
        try {
            $result = VAScore::where('patient_uuid', $this->uuid)->update($this->input);
            if ($result) {        
                $msg = 'Visual Analog Scale For Patient ['.$name.'] update successfull!';
                LivewireAlert::title('Patient VA Score info updated')->success()->asToast()->show();  
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
            } else {
                $msg = 'Visual Analog Scale For Patient ['.$name.'] could not be saved';
                LivewireAlert::title('Patient VA Score info failed')->warning()->asToast()->show();
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error: Visual Analog Scale For Patient ['.$name.'] while saving : '.$e->getMessage();
            LivewireAlert::title('Patient VA Score info failed')->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error: Visual Analog Scale For Patient ['.$name.'] while saving : '.$e->getMessage();
            LivewireAlert::title('Patient VA Score info failed')->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } 
    }
}
