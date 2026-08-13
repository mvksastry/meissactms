<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\SensoryExamination;
//forms
use App\Livewire\Forms\PatientSEForm;
//traits
use App\Traits\Base;
use App\Traits\TCtms\TPatientSEData;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class FollowupSensoryExams extends Component
{
    use Base;
    use TPatientSEData;
    
    //Form bindings
    public PatientSEForm $form;

    public $patient_uuid;
    public $data_type;


    public function render()
    {
        return view('livewire.ctms.followups.followup-sensory-exams');
    }

    public function fnSaveSensoryExaminationData()
    {
        $this->form->validate();
        $this->input = $this->form->all();
        $this->input = $this->sanitizeInput($this->input);
        //dd($this->input); // 
        $result = $this->saveFollowupPatientSEInformation($this->input);
        LivewireAlert::title('Follow-up Sensory Exam Data Saved...')->success()->asToast()->show();
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
        $newSEInfo->data_type = $this->data_type;

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

        $newSEInfo->status = "draft";
        $newSEInfo->status_date = date('Y-m-d');

        $newSEInfo->comment_entered_by = $input['comment_entered_by'];
        $newSEInfo->entered_by = $input['entered_by'];
        $newSEInfo->entry_date = $input['entry_date'];
        //dd($newSEInfo);
        try {
            $this->msg_panel = true;
            $result = $newSEInfo->save();//this updates single object.

            if ($result) { 
                return $result;
            } else {
                $msg = 'User [ '.Auth::user()->name.' ] could not save '.$this->data_type.' Sensory Exam data';
                $this->sysAlertDanger = $msg;
                LivewireAlert::title($msg)->warning()->asToast()->show();
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database query error for new patient while saving '.$this->data_type.' Sensory Exam Data. :'.$e->getMessage();
            LivewireAlert::title($msg)->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected exception for while saving '.$this->data_type.' Sensory Exam Data. :'.$e->getMessage();
            LivewireAlert::title($msg)->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        }
    }
}
