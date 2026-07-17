<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms
use App\Livewire\Forms\PatientCIForm;

//traits
use App\Traits\TCtms\TPatientClinicalData;
//logs
use Illuminate\Support\Facades\Log;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class FollowupClinicalInvestigations extends Component
{
   //Trait
    use TPatientClinicalData;

    //Form bindings
    public PatientCIForm $form;

    //global patient uuid
    public $patient_uuid, $data_type, $entry="";

    public $discharge_report, $discharge_report_file;

    //Biochemical investigations
    public $admission_date, $in_patient_id;
    public $oande, $pr, $temperature, $bp_systolic, $bp_diastolic, $cvs, $panda, $cns;
    public $cbc, $esr, $crp, $rft, $lft, $clotting_time, $bleeding_time, $prothrombin_time, $procalcitonin, $lab_report_file;

    //Common to all panels;
    public $entered_by, $entry_date, $verified_by, $verified_date, $entry_sealed_by, $entry_sealed_date;

    //public function render()
    //{
     //   return view('livewire.ctms.patients.patient-clinical-investigations');
    //}
    //logged user
    public $logged_user, $passObj;

    public function mount($patient_uuid, $data_type)
    {
        //dd($patient_uuid);
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        $passObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $passObj->opd_id;
        $this->form->in_patient_id = $passObj->in_patient_id;
        $this->form->admission_date = $passObj->admission_date;
        $this->form->entered_by = $passObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
        //dd($passObj, $this->form);
       
    }

    public function fnSaveClinicalData()
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientCIInformation($this->input);
        LivewireAlert::title('Follow-up Clinical Data Saved...')->success()->asToast()->show();
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Clinical Data for patient ['.$this->patient_uuid.']');
        //dd($result); //
    }

    public function saveFollowupCIInformation($input)
    {
        //dd($input);
        $newCIInfo = new ClinicalData();
        
        $newCIInfo->patient_uuid = $this->patient_uuid; 
        //dd($newCIInfo);
        $newCIInfo->opd_id = $input['opd_id'];
        $newCIInfo->in_patient_id = $input['in_patient_id'];
        $newCIInfo->admission_date = $input['admission_date'];

        $newCIInfo->o_e = $input['o_e'];
        $newCIInfo->pr = $input['pr'];
        $newCIInfo->temperature = $input['temperature'];
        $newCIInfo->bp_systolic = $input['bp_systolic'];
        $newCIInfo->bp_diastolic = $input['bp_diastolic'];
        $newCIInfo->cvs = $input['cvs'];
        $newCIInfo->p_a = $input['p_a'];
        $newCIInfo->cns = $input['cns'];

        $newCIInfo->cbc = $input['cbc'];
        $newCIInfo->esr = $input['esr'];
        $newCIInfo->crp = $input['crp'];
        $newCIInfo->rft = $input['rft'];
        $newCIInfo->lft = $input['lft'];
        $newCIInfo->clotting_time = $input['clotting_time'];
        $newCIInfo->bleeding_time = $input['bleeding_time'];
        $newCIInfo->prothrombin_time = $input['prothrombin_time'];
        $newCIInfo->procalcitonin = $input['procalcitonin'];
        $newCIInfo->laboratory_report_file = $input['laboratory_report_file'];

        $newCIInfo->status = "follow-up-".$this->data_type;
        $newCIInfo->status_date = date('Y-m-d');

        $newCIInfo->comment_entered_by = $input['comment_entered_by'];
        $newCIInfo->entered_by = $input['entered_by'];
        $newCIInfo->entry_date = $input['entry_date'];
        //$newCIInfo->verified_by = $input['verified_by'];
        //$newCIInfo->verified_date = $input['verified_date'];
        //$newCIInfo->sealed_by = $input['entry_sealed_by'];
        //$newCIInfo->sealed_date = $input['entry_sealed_date'];

        //dd($newCIInfo);
        $result = $newCIInfo->save();
        return $result;
    }
}
