<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\ModqScore;

//forms
use App\Livewire\Forms\ModqScoreForm;

//Traits
use App\Traits\Base;
//use App\Traits\TCtms\TPatientModqScore;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class FollowupModiqScores extends Component
{
    use Base;
    //default modq arrav values
    //Traits
    //use TPatientModqScore;

    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //Form bindings
    public ModqScoreForm $form;
    
    //MODIQ score 
    public $pain_intensity, $PI, $personal_care, $lifting, $walking, $sitting, $standing, $sleeping, $social_life;
    public $travelling, $emp_home;

    //This particular one the tab has to be set 
    public $set_active_tab = "modq", $tab1 ="active", $tab2="null";

    //score calculation
    public $total=0, $selectedCount = 0, $mod_score;
    public $painIntensitySelected, $personalCareSelected, $liftingSelected, $walkingSelected, $sittingSelected;
    public $standingSelected, $sleepingSelected, $socialLifeSelected, $travelSelected, $empHomeSelected;

    public $show_entered_values = false, $modq_entered;

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

        $this->painIntensitySelected = $this->pain_intensity;

        $this->modq_entered = ModqScore::where('patient_uuid', $this->patient_uuid)->first();
        //dd($this->modq_entered);
        if($this->modq_entered != null)
        {
            $this->show_entered_values = true;
        }
    }

    public function updatedPainIntensity($val): void
    { 
        $this->painIntensitySelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedPersonalCare($val): void
    {
        $this->personalCareSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedLifting($val): void
    {
        $this->liftingSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedWalking($val): void
    {
        $this->walkingSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSitting($val): void
    {
        $this->sittingSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedStanding($val): void
    {
        $this->standingSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSleeping($val): void
    {
        $this->sleepingSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSocialLife($val): void
    {
        $this->socialLifeSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedTravelling($val): void
    {
        $this->travelSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedEmpHome($val): void
    {
        $this->empHomeSelected = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }
    
    public function totalPainIndex()
    {
        $this->total =    $this->painIntensitySelected + 
                    $this->personalCareSelected +
                    $this->liftingSelected +
                    $this->walkingSelected +
                    $this->sittingSelected +
                    $this->standingSelected +
                    $this->sleepingSelected +
                    $this->socialLifeSelected +
                    $this->travelSelected +
                    $this->empHomeSelected;

        $this->mod_score = ($this->total/($this->selectedCount*5))*100;
    }

    public function fnSaveMODQScore()
    {
        $modelName = "MODQ Score";
        $this->form->validate();
        $this->input = $this->form->all();
        $this->input = $this->sanitizeInput($this->input);
         $this->input['data_type'] = $this->data_type;
        //dd($this->input);
        $result = $this->updateOrCreateDiagnosticTest($this->patient_uuid, $modelName, $this->input);
        //$result = $this->saveFollowupMODQScore($this->input);
        LivewireAlert::title('Follow-up MODQ Data Saved...')->success()->asToast()->show();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved '.$this->data_type.' MODQ data');
        //dd($result); 
    }

    public function saveFollowupMODQScore($input)
    {
      //dd("reached trait");
      //$nModqScore = new ModqScore();
      $nModqScore = new ModqScore();
      $nModqScore->patient_uuid = $this->patient_uuid; 
      //dd($nModqScore);
      $nModqScore->opd_id =  $input['opd_id'];
      $nModqScore->in_patient_id =  $input['in_patient_id'];
      $nModqScore->admission_date =  $input['admission_date'];
      $nModqScore->data_type = $this->data_type;

      $nModqScore->pain_intensity = $this->pain_intensity;
      $nModqScore->personal_care = $this->personal_care;
      $nModqScore->lifting = $this->lifting;
      $nModqScore->walking = $this->walking;
      $nModqScore->sitting = $this->sitting;
      $nModqScore->standing = $this->standing;
      $nModqScore->sleeping = $this->sleeping;
      $nModqScore->social_life = $this->social_life;
      $nModqScore->travelling = $this->travelling;
      $nModqScore->employment_home_making = $this->emp_home;
      $nModqScore->total = $this->total;
      $nModqScore->modq_score = $this->mod_score;

      $nModqScore->status = "draft";
      $nModqScore->status_date = date('Y-m-d');

      $nModqScore->comment_entered_by = $input['comment_entered_by'];
      $nModqScore->entered_by = $input['entered_by'];
      $nModqScore->entry_date = $input['entry_date'];
      //$nModqScore->verified_by = $input['verified_by'];
      //$nModqScore->verified_date = $input['verified_date'];
      //$nModqScore->sealed_by = $input['entry_sealed_by'];
      //$nModqScore->sealed_date = $input['entry_sealed_date'];

      //dd($nModqScore);
      //       //here write code to remove form fields for all traits
        try {
            $this->msg_panel = true;
            $result = $nModqScore->save();//this updates single object.

            if ($result) { 
                $this->show_entered_values = true;
                $this->modq_entered = ModqScore::where('patient_uuid', $this->patient_uuid)->first();
                $this->resetInputs();
                return $result;
            } else {
                $msg = 'User [ '.Auth::user()->name.' ] could not save '.$this->data_type.' MODQ data';
                $this->sysAlertDanger = $msg;
                LivewireAlert::title($msg)->warning()->asToast()->show();
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database query error for new patient while saving '.$this->data_type.' MODQ Data. :'.$e->getMessage();
            LivewireAlert::title($msg)->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected exception for while saving '.$this->data_type.' MODQ Data. :'.$e->getMessage();
            LivewireAlert::title($msg)->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        }
    }
}
