<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PatientVAScoreForm;

use App\Models\Ctms\VAScore;

class EditVisualAnalogScore extends Component
{
    //Form bindings
    public PatientVAScoreForm $form;

    //uuid of the patient
    public $uuid;
    public $vascore;

    public function render()
    {
        $this->vascore = VAScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->setVAscoreData($this->vascore);
        return view('livewire.ctms.patients.edit.edit-visual-analog-score');
    }

    public function setVAscoreData($vascore)
    {
        //dd($vascore);
        $this->form->opd_id = ($vascore != null) ? $vascore->opd_id : "";
        $this->form->in_patient_id = ($vascore != null) ? $vascore->in_patient_id : "";
        $this->form->admission_date = ($vascore != null) ? $vascore->admission_date : null;

        $this->form->intensity = ($vascore != null) ? $vascore->intensity : "";
        $this->form->location = ($vascore != null) ? $vascore->location : "";
        $this->form->onset = ($vascore != null) ? $vascore->onset : "";
        $this->form->duration = ($vascore != null) ? $vascore->duration : "";
        $this->form->variation = ($vascore != null) ? $vascore->variation : "";
        $this->form->quality = ($vascore != null) ? $vascore->quality : "";

        $this->form->comment_entered_by = ($vascore != null) ? $vascore->comment_entered_by : "";
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = ($vascore != null) ? $vascore->entry_date : null;
        //dd($this->form);
    }

    public function fnEditVAscoreData()
    {
        $this->input = $this->form->all();
        //dd($this->uuid, $this->input);
        $result = VAScore::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
        
        $this->dispatch('close_vascore_panel'); 
    }
}
