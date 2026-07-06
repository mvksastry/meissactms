<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PfirmannForm;

//Traits
use App\Traits\TCtms\TPatientPfirmannData;

//logs
use Illuminate\Support\Facades\Log;

class FollowupModifiedPfirmanns extends Component
{
    //Trait for data handling
    use TPatientPfirmannData;
    //Form bindings
    public PfirmannForm $form;
    //global patient uuid
    public $patient_uuid;
    public $data_type;

    public $modified_pfirmans_grade = null;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();

        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSavePfirmannGrade()
    {
        $this->input = $this->form->all();
        //dd($this->input); //
        $result = $this->saveFollowupPfirmannGrade($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Pfirmann score data');
        //dd($result); // 
    }

    public function saveFollowupPfirmannGrade($input)
    {
       // dd("reached trait");
        //$nPfirmannScore = new PfirmannGrade();
        $nPfirmannScore = new PfirmannGrade();
        //dd($nPfirmannScore);
        $nPfirmannScore->patient_uuid = $this->patient_uuid; 

        $nPfirmannScore->opd_id =  $input['opd_id'];
        $nPfirmannScore->in_patient_id =  $input['in_patient_id'];
        $nPfirmannScore->admission_date =  $input['admission_date'];

        $nPfirmannScore->modified_pfirman_grade = $input['modified_pfirman_grade'];

        $nPfirmannScore->status = "follow-up-".$this->data_type;
        $nPfirmannScore->status_date = date('Y-m-d');

        $nPfirmannScore->comment_entered_by = $input['comment_entered_by'];
        $nPfirmannScore->entered_by = $input['entered_by'];
        $nPfirmannScore->entry_date = $input['entry_date'];
        //$nPfirmannScore->verified_by = $input['verified_by'];
        //$nPfirmannScore->verified_date = $input['verified_date'];
        //$nPfirmannScore->sealed_by = $input['entry_sealed_by'];
        //$nPfirmannScore->sealed_date = $input['entry_sealed_date'];

        //dd($nPfirmannScore);
        $result = $nPfirmannScore->save();
        return $result;
    }
}
