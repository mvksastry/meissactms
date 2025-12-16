<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\ModqScoreForm;

use App\Models\Ctms\ModqScore;

class EditModiqScore extends Component
{
    //binding
    public ModqScoreForm $form;

    //uuid of the patient
    public $uuid;
    public $modq_info;

    public $pain_intensity, $personal_care, $lifting, $walking, $sitting, $standing, 
            $sleeping, $social_life, $travelling, $employment_home_making;

    public $painIntensitySelected;
    public $personalCareSelected;
    public $liftingSelected;
    public $walkingSelected;
    public $sittingSelected;
    public $standingSelected;
    public $sleepingSelected;
    public $socialLifeSelected;
    public $travelSelected;
    public $empHomeSelected;

    public $selectedCount;
    public $total;
    public $modq_score;
    
    //model object retrieved
    public $modq_obj;

    public function render()
    {
        $this->modq_obj = ModqScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->setModqScoreData($this->modq_obj);
        return view('livewire.ctms.patients.edit.edit-modiq-score');
    }

    public function setModqScoreData($modq_obj)
    {
        //dd($modq_obj);
        $this->form->opd_id = ($modq_obj != null) ? $modq_obj->opd_id : "";
        $this->form->in_patient_id = ($modq_obj != null) ? $modq_obj->in_patient_id : "";
        $this->form->admission_date = ($modq_obj != null) ? $modq_obj->admission_date : null;

        $this->pain_intensity = ($modq_obj != null) ? $modq_obj->pain_intensity : "";
        $this->personal_care = ($modq_obj != null) ? $modq_obj->personal_care : "";
        $this->lifting = ($modq_obj != null) ? $modq_obj->lifting : "";
        $this->walking = ($modq_obj != null) ? $modq_obj->walking : "";
        $this->sitting = ($modq_obj != null) ? $modq_obj->sitting : "";
        $this->standing = ($modq_obj != null) ? $modq_obj->standing : "";
        $this->sleeping = ($modq_obj != null) ? $modq_obj->sleeping : "";
        $this->social_life = ($modq_obj != null) ? $modq_obj->social_life : "";
        $this->empoloyment_home_making = ($modq_obj != null) ? $modq_obj->employment_home_making : "";

        $this->form->comment_entered_by = ($modq_obj != null) ? $modq_obj->comment_entered_by : "";
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = ($modq_obj != null) ? $modq_obj->entry_date : null;
        //dd($this->form);
    }

    public function updatedPainIntensity($val): void
    { 
        $this->painIntensitySelected = $val;
        $this->form->pain_intensity = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedPersonalCare($val): void
    {
        $this->personalCareSelected = $val;
        $this->form->personal_care = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedLifting($val): void
    {
        $this->liftingSelected = $val;
        $this->form->lifting = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedWalking($val): void
    {
        $this->walkingSelected = $val;
        $this->form->walking = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSitting($val): void
    {
        $this->sittingSelected = $val;
        $this->form->sitting = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedStanding($val): void
    {
        $this->standingSelected = $val;
        $this->form->standing = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSleeping($val): void
    {
        $this->sleepingSelected = $val;
        $this->form->sleeping = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSocialLife($val): void
    {
        $this->socialLifeSelected = $val;
        $this->form->social_life = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedTravelling($val): void
    {
        $this->travelSelected = $val;
        $this->form->travelling = $val;
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedEmpHome($val): void
    {
        $this->empHomeSelected = $val;
        $this->form->employment_home_making = $val;
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

        $this->modq_score = ($this->total/($this->selectedCount*5))*100;

    }

    public function fnEditModqScoreData()
    {
        $this->form->total = $this->total;
        $this->form->modq_score = $this->modq_score;
        $this->input = $this->form->all();
        
        //dd($this->total, $this->modq_score, $this->uuid, $this->input, $this->form);
        $result = ModqScore::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
        
        $this->dispatch('close_modqscore_panel'); 
    }
}
