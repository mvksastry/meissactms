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

//logs
use Illuminate\Support\Facades\Log;

class EditVisualAnalogScore extends Component
{
    //Form bindings
    public PatientVAScoreForm $form;

    //uuid of the patient
    public $uuid;
    public $vascore;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
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

        $this->form->intensity = $vascore->intensity;
        $this->form->location = $vascore->location;
        $this->form->onset = $vascore->onset;
        $this->form->duration = $vascore->duration;
        $this->form->variation = $vascore->variation;
        $this->form->quality = $vascore->quality;

        $this->form->comment_entered_by = $vascore->comment_entered_by;
        $this->form->entered_by = $vascore->entered_by;
        $this->form->entry_date = $vascore->entry_date;
        //dd($this->form);
    }

    public function fnEditVAscoreData()
    {
        $this->message_panel = false;
        $this->validate(); 
        $this->input = $this->form->all();
        //dd($this->uuid, $this->input);
        $this->message_panel = true;
        $name = $this->uuid;
        try {
            $result = VAScore::where('patient_uuid', $this->uuid)->update($this->input);
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
