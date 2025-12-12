<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\ModqScoreForm;

//Traits
use App\Traits\TCtms\TPatientModqScore;

class PatientModiqScore extends Component
{
    //Traits
    use TPatientModqScore;

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

    public function render()
    {
        return view('livewire.ctms.patients.patient-modiq-score');
    }

    public function mount()
    {
        $this->painIntensitySelected = $this->pain_intensity;
    }

    public function fnSaveMODQScore()
    {
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->entered_by);
        $this->input = $this->form->all();
        //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->saveMODQScore($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
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
