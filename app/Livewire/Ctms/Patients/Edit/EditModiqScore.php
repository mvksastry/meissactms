<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\ModqScore;

//forms
use App\Livewire\Forms\ModqScoreForm;

//traits, facades

//logs
use Illuminate\Support\Facades\Log;

class EditModiqScore extends Component
{
        //default modq arrav values
    public $painIntensity = [
        0 => 'I can tolerate the pain I have without having to use pain medication.', 
        1 => 'The pain is bad, but I can manage without having to take pain medication.', 
        2 => 'Pain medication provides me with complete relief from pain.', 
        3 => 'Pain medication provides me with moderate relief from pain.', 
        4 => 'Pain medication has no effect on my pain.', 
        5 => 'Pain medication has no effect on my pain.'
    ];

    public $persCare = [
        0 => 'I can take care of myself normally without causing increased pain',
        1 => 'I can take care of myself normally, but it increases my pain',
        2 => 'It is painful to take care of myself, and I am slow and careful.',
        3 => 'I need help, but I am able to manage most of my personal care.',
        4 => 'I need help every day in most aspects of my care.',
        5 => 'I do not get dressed, I wash with difficulty, and I stay in bed.'
    ];

    public $modq_lifting = [
        0 => 'I can lift heavy weights without increased pain.',
        1 => 'I can life heavy weights, but it causes increased pain.',
        2 => 'Pain prevents me from lifting heavy weights off the floor, but I can manage if the weights are conveniently positioned (e.g. on a table).',
        3 => 'Pain prevents me from lifting heavy weights, but I can manage light to medium weights if they are conveniently positioned.',
        4 => 'I can lift only very light weights.',
        5 => 'I cannot lift or carry anything at all.'
    ];

    public $modq_walking = [
        0 => 'Pain does not prevent me from walking any distance.',
        1 => 'Pain prevents me from walking more than 1 mile.',
        2 => 'Pain prevents me from walking more than 1/2 (half) mile.',
        3 => 'Pain prevents me from walking more than 1/4 (quarter) mile.',
        4 => 'I can walk only with crutches or a cane.',
        5 => 'I am in bed most of the time and have to crawl to the toilet.'
    ];

    public $modq_sitting = [
        0 => 'I can sit in any chair as long as I like.',
        1 => 'I can only sit in my favourite chair as long as I like.',
        2 => 'Pain prevents me from sitting for more than 1 hour.',
        3 => 'Pain prevents me from sitting for more than 1/2 hour.',
        4 => 'Pain prevents me from sitting for more than 10 minutes.',
        5 => 'Pain prevents me from sitting at all.'
    ];

    public $modq_standing = [
        0 => 'I can stand as long as I want without increased pain.',
        1 => 'I can stand as long as I want, but it increases my pain.',
        2 => 'Pain prevents me from standing for more than 1 hour.',
        3 => 'Pain prevents me from standing for more than 1/2 hour.',
        4 => 'Pain prevents me from standing for more than 10 minutes.',
        5 => 'Pain prevents me from standing at all.',
    ];


    public $modq_sleeping = [
        0 => 'Pain does not prevent me from sleeping well.',
        1 => 'I can sleep well only by using pain medication.',
        2 => 'Even when I take medication, I sleep less than 6 hours.',
        3 => 'Even when I take medication, I sleep less than 4 hours.',
        4 => 'Even when I take medication, I sleep less than 2 hours.',
        5 => 'Pain prevents me from sleeping at all.',
    ];

    public $modq_sociallife = [
        0 => 'My social life is normal and does not increase my pain.',
        1 => 'My social life is normal, but it increases my level of pain.',
        2 => 'Pain prevents me from participating in more energetic activities (e.g. sport, dancing).',
        3 => 'Pain prevents me from going out very often.',
        4 => 'Pain has restricted my social life to my home.',
        5 => 'I have hardly any social life because of my pain.',
    ];   


    public $modq_travelling = [
        0 => 'I can travel anywhere without increased pain.',
        1 => 'I can travel anywhere, but it increases my pain.',
        2 => 'My pain restricts my travel over 2 hours.',
        3 => 'My pain restricts my travel over 1 hours.',
        4 => 'My pain restricts my travel to short necessary journeys under 1/2 hours.',
        5 => 'My pain prevents all travel except for visits to the physician/therapist or hospital.',
    ]; 


    public $modq_emphome = [
        0 => 'My normal homemaking/job activities do not cause pain.',
        1 => 'My normal homemaking/job activities increase my pain, but i can still perform all that is required of me.',
        2 => 'I can perform most of my homemaking/job duties, but pain prevents me from performing more physically stressful activities(e.g. lifting, vacuuming).',
        3 => 'Pain prevents me from doing anything but light duties.',
        4 => 'Pain prevents me from doing even light duties.',
        5 => 'Pain prevents me from performing any job or homemaking chores.',
    ]; 

    //binding
    public ModqScoreForm $form;

    //uuid of the patient
    public $uuid;
    public $modq_info;

    public $pain_intensity, $personal_care, $lifting, $walking, $sitting, $standing, 
            $sleeping, $social_life, $travelling, $emp_home, $employment_home_making;

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

    //Errors, Alers, Callouts
    public $msg_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        $this->modq_obj = ModqScore::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->form->entered_by = Auth::user()->name;
        $this->setModqScoreData($this->modq_obj);
        return view('livewire.ctms.patients.edit.edit-modiq-score');
    }

    public function setModqScoreData($modq_obj)
    {
        //dd($modq_obj);
        $this->form->opd_id = $modq_obj->opd_id;
        $this->form->in_patient_id = $modq_obj->in_patient_id;
        $this->form->admission_date = $modq_obj->admission_date;
        /*
        $this->pain_intensity = $modq_obj->pain_intensity;
        $this->personal_care = $modq_obj->personal_care;
        $this->lifting = $modq_obj->lifting;
        $this->walking = $modq_obj->walking;
        $this->sitting = $modq_obj->sitting;
        $this->standing = $modq_obj->standing;
        $this->sleeping = $modq_obj->sleeping;
        $this->social_life = $modq_obj->social_life;
        $this->empoloyment_home_making = $modq_obj->employment_home_making;
        */
        $this->form->comment_entered_by = $modq_obj->comment_entered_by;
        $this->form->entered_by = $modq_obj->entered_by;
        $this->form->entry_date = $modq_obj->entry_date;
        //dd($this->form);
    }

    public function updatedPainIntensity($val): void
    { 
        $this->painIntensitySelected = $val;
        $this->form->pain_intensity = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedPersonalCare($val): void
    {
        $this->personalCareSelected = $val;
        $this->form->personal_care = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedLifting($val): void
    {
        $this->liftingSelected = $val;
        $this->form->lifting = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedWalking($val): void
    {
        $this->walkingSelected = $val;
        $this->form->walking = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSitting($val): void
    {
        $this->sittingSelected = $val;
        $this->form->sitting = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedStanding($val): void
    {
        $this->standingSelected = $val;
        $this->form->standing = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSleeping($val): void
    {
        $this->sleepingSelected = $val;
        $this->form->sleeping = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedSocialLife($val): void
    {
        $this->socialLifeSelected = $val;
        $this->form->social_life = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedTravelling($val): void
    {
        $this->travelSelected = $val;
        $this->form->travelling = intval($val);
        $this->selectedCount = $this->selectedCount +1;
        $do = $this->totalPainIndex();
    }

    public function updatedEmploymentHomeMaking($val): void
    {
        //dd($val);
        $this->empHomeSelected = $val;
        $this->form->employment_home_making = intval($val);
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
        $this->message_panel = false;
        $this->validate(); 
        //$this->form->total = $this->total;
        //$this->form->modq_score = $this->modq_score;
        $this->input = $this->form->all();
        $this->input['total'] = $this->total;
        $this->input['modq_score'] = $this->modq_score;
        //dd($this->input, $this->form);
        //dd($this->uuid, $this->input);
        $this->message_panel = true;
        $name = $this->uuid;
        try {
            $result = ModqScore::where('patient_uuid', $this->uuid)->update($this->input);
            if ($result) {        
                $msg = 'Patient ['.$name.'] update successfull!';  
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
            } else {
                $msg = 'Patient ['.$name.'] could not be saved';
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } 
    }
}
