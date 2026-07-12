<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PatientVAScoreForm;

//Traits
use App\Traits\TCtms\TVAScores;

//logs
use Illuminate\Support\Facades\Log;

class FollowupVisualAnalogs extends Component
{
    //Traits
    use TVAScores;
    //Form bindings
    public PatientVAScoreForm $form;
    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //Visual Analog Scores
    public $intensity, $location, $onset, $duration, $variation, $quality;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;

        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSaveVAscoreData()
    {
        $this->input = $this->form->all();
        //dd($this->input); //
        $result = $this->saveFollowupVAScores($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Visual Analog score data');
        //dd($result); //
    }

    public function saveFollowupVAScores($input)
    {
        // dd("reached trait");
        $nVAScores = new VAScore();
        $nVAScores->patient_uuid = $this->patient_uuid; 
        //dd($nVAScores);
        $nVAScores->opd_id =  $input['opd_id'];
        $nVAScores->in_patient_id =  $input['in_patient_id'];
        $nVAScores->admission_date =  $input['admission_date'];

        $nVAScores->intensity = $input['intensity'];
        $nVAScores->location = $input['location'];
        $nVAScores->onset = $input['onset'];
        $nVAScores->duration = $input['duration'];
        $nVAScores->variation = $input['variation'];
        $nVAScores->quality = $input['quality'];
        $nVAScores->vas_scale = $input['vas_scale'];
        $nVAScores->pfr_scale = $input['pfr_scale'];

        $nVAScores->status = "follow-up-".$this->data_type;
        $nVAScores->status_date = date('Y-m-d');

        $nVAScores->comment_entered_by = $input['comment_entered_by'];
        $nVAScores->entered_by = $input['entered_by'];
        $nVAScores->entry_date = $input['entry_date'];
        //$nVAScores->verified_by = $input['verified_by'];
        //$nVAScores->verified_date = $input['verified_date'];
        //$nVAScores->sealed_by = $input['entry_sealed_by'];
        //$nVAScores->sealed_date = $input['entry_sealed_date'];
        //dd($nVAScores);
        $result = $nVAScores->save();
        return $result;
    }
}
