<?php

namespace App\Livewire\Ctms\Patients;

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
use App\Traits\TCtms\TPatientModqScore;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class PatientModiqScore extends Component
{
    //Traits
    use TPatientModqScore;

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

    public function render()
    {
        return view('livewire.ctms.patients.patient-modiq-score');
    }

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

    public function fnSaveMODQScore()
    {
        $this->form->validate();
        $this->input = $this->form->all();
        $this->input['data_type'] = $this->data_type;
        //dd($this->input);
        $result = $this->saveMODQScore($this->input);
        LivewireAlert::title('MODIQ Score Data Saved...')->success()->asToast()->show();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved MODQ data');
        $msg = 'User ['.Auth::user()->name.'] Saved MODIQ Score for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        //dd($result); 
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

}
