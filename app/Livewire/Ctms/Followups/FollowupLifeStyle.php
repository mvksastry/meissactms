<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;

//forms
use App\Livewire\Forms\PatientLSForm;

//traits-facades
use App\Traits\TCtms\TPatientLifeStyle;
use Livewire\WithFileUploads;

//logs
use Illuminate\Support\Facades\Log;

class FollowupLifeStyle extends Component
{
    //Trait binding
    use TPatientLifeStyle;
    //Form bindings
    public PatientLSForm $form;
    //global patient uuid
    public $patient_uuid;
    //data binding
    public $input;

    public $form_header;

    //form variables
    public $opd_id, $in_patient_id, $admission_date;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = null, $sysAlertWarning = null, $sysAlertInfo = null, $sysAlertDanger = null;
    public $msg_panel = false;
    public $comDanger = null, $comWarning = null, $comInfo = null, $comSuccess = null;

    public $cross_leg_sitting, $standing, $sitting, $ls3, $ls4, $ls5, $ls6, $life_style_description;

    public $newObj;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;

        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
    }

    public function fnSavePatientLSInfo()
    {
        $this->input = $this->form->all();
        //dd($this->input); 
        $result = $this->saveFollowupPatientLSInformation($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved life style data');
    }

    public function saveFollowupPatientLSInformation($input)
    {
        //dd($input);
        //$patientInfo = Patient::where('patient_uuid', $this->patient_uuid)->first();

        $newLSinfo = new LifeStyle();

        $newLSinfo->patient_uuid = $this->patient_uuid; 

        $newLSinfo->opd_id = $input['opd_id'];
        $newLSinfo->in_patient_id = $input['in_patient_id'];
        $newLSinfo->admission_date = $input['admission_date'];

        $newLSinfo->cross_leg_sitting = $input['cross_leg_sitting'];
        $newLSinfo->standing = $input['standing'];
        $newLSinfo->sitting = $input['sitting'];
        $newLSinfo->ls3 = $input['ls3'];
        $newLSinfo->ls4 = $input['ls4'];
        $newLSinfo->ls5 = $input['ls5'];
        $newLSinfo->ls6 = $input['ls6'];
        $newLSinfo->life_style_description = $input['life_style_description'];

        $newLSinfo->status = "follow-up";
        $newLSinfo->status_date = date('Y-m-d');

        $newLSinfo->comment_entered_by = $input['comment_entered_by'];
        $newLSinfo->entered_by = $input['entered_by'];
        $newLSinfo->entry_date = $input['entry_date'];

        //dd($newLSinfo);
        $result = $newLSinfo->save();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved life style data');
        return $result;
    }
}
