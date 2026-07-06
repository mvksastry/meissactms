<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;

class FollowupSensoryExams extends Component
{
    public $patient_uuid;
    public $data_type;
    
    public function render()
    {
        return view('livewire.ctms.followups.followup-sensory-exams');
    }

    public function fnSaveSensoryExaminationData()
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveFollowupPatientSEInformation($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Sensory Exam data');
        //dd($result); //
    }

    public function saveFollowupPatientSEInformation($input)
    {

        //$newSEInfo = new SensoryExamination();
        $newSEInfo = new SensoryExamination();
        
        $newSEInfo->patient_uuid = $this->patient_uuid; 
        //dd($nModqScore);
        $newSEInfo->opd_id =  $input['opd_id'];
        $newSEInfo->in_patient_id =  $input['in_patient_id'];
        $newSEInfo->admission_date =  $input['admission_date'];

        $newSEInfo->lL1 = $input['lL1'];
        $newSEInfo->lL2 = $input['lL2'];
        $newSEInfo->lL3 = $input['lL3'];
        $newSEInfo->lL4 = $input['lL4'];
        $newSEInfo->lL5 = $input['lL5'];
        $newSEInfo->lS1 = $input['lS1'];

        $newSEInfo->rL1 = $input['rL1'];
        $newSEInfo->rL2 = $input['rL2'];
        $newSEInfo->rL3 = $input['rL3'];
        $newSEInfo->rL4 = $input['rL4'];
        $newSEInfo->rL5 = $input['rL5'];
        $newSEInfo->rS1 = $input['rS1'];

        $newSEInfo->status = "follow-up-".$this->data_type;
        $newSEInfo->status_date = date('Y-m-d');

        $newSEInfo->comment_entered_by = $input['comment_entered_by'];
        $newSEInfo->entered_by = $input['entered_by'];
        $newSEInfo->entry_date = $input['entry_date'];
        //dd($newSEInfo);
        $result = $newSEInfo->save();
        return $result;
    }
}
