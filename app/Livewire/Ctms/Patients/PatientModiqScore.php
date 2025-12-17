<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\ModqScoreForm;

//Traits
use App\Traits\TCtms\TPatientModqScore;

use App\Models\Ctms\Patient;
use App\Models\Ctms\ModqScore;

class PatientModiqScore extends Component
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
    //Traits
    use TPatientModqScore;

    //global patient uuid
    public $patient_uuid;

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

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;

        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');

        $this->painIntensitySelected = $this->pain_intensity;

        $this->modq_entered = ModqScore::where('patient_uuid', $this->patient_uuid)->first();
        if($this->modq_entered != null)
        {
            $this->show_entered_values = true;
        }
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
