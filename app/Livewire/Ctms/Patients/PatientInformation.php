<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;
use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;
use App\Models\Ctms\PatientEpoch;

use App\Models\Ctms\Clinicals\BloodRoutine;
use App\Models\Ctms\Clinicals\BloodSugar;
use App\Models\Ctms\Clinicals\BloodUrea;
use App\Models\Ctms\Clinicals\ChemicalExam;
use App\Models\Ctms\Clinicals\Creatinine;
use App\Models\Ctms\Clinicals\Crp;
use App\Models\Ctms\Clinicals\Electrolytes;
use App\Models\Ctms\Clinicals\GeneralSummary;
use App\Models\Ctms\Clinicals\Il6;
use App\Models\Ctms\Clinicals\LaboratoryExam;
use App\Models\Ctms\Clinicals\LiverFunction;
use App\Models\Ctms\Clinicals\MicroscopicExam;
use App\Models\Ctms\Clinicals\RenalFunction;
use App\Models\Ctms\Clinicals\UrineRoutine;

//forms

//traits, classes
use Livewire\WithFileUploads;

//logs
use Illuminate\Support\Facades\Log;

class PatientInformation extends Component
{
    //all traits, classes injected
    use WithFileUploads;

    //logged user
    public $logged_user;

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

    public $rmqreplies = [
        1 => "I stay at home most of the time because of my back.",
        2 => "I change position frequently to try to get my back comfortable.",
        3 => "I walk more slowly than usual because of my back. ", 
        4 => "Because of my back, I am not doing any jobs that I usually do around the house.", 
        5 => "Because of my back, I use a handrail to get upstairs. ", 
        6 => "Because of my back, I lie down to rest more often.  ", 
        7 => "Because of my back, I have to hold on to something to get out of an easy chair.", 
        8 => "Because of my back, I try to get other people to do things for me.", 
        9 => "I get dressed more slowly than usual because of my back.", 
        10 => "I only stand up for short periods of time because of my back.", 
        11 => "Because of my back, I try not to bend or kneel down.  ", 
        12 => "I find it difficult to get out of a chair because of my back.", 
        13 => "My back is painful almost all of the time.", 
        14 => "I find it difficult to turn over in bed because of my back.", 
        15 => "My appetite is not very good because of my back.", 
        16 => "I have trouble putting on my socks (or stockings) because of the pain in my back.", 
        17 => "I can only walk short distances because of my back pain.", 
        18 => "I sleep less well because of my back.", 
        19 => "Because of my back pain, I get dressed with the help of someone else.", 
        20 => "I sit down for most of the day because of my back.", 
        21 => "I avoid heavy jobs around the house because of my back.", 
        22 => "Because of back pain, I am more irritable and bad tempered with people than usual.", 
        23 => "Because of my back, I go upstairs more slowly than usual.", 
        24 => "I stay in bed most of the time because of my back.",
    ];
    //default panels
    public $patientInfoButtons = false;
    public $TimelinePatient = false;

    //Form openings
    public $panel_primary_info = false;
    public $panel_life_style = false;

    public $p1 = false;
    public $p2 = false;
    public $p3 = false;
    public $p4 = false;
    public $p5 = false;
    public $p6 = false;

    public $p7 = false;
    public $p8 = false;
    public $p9 = false;
    public $p10 = false;

    //active patient panel

    //data object variables
    public $patientPrimaryInfo;
    public $ls_info;
    public $clinical_info, $ci1Obj, $ci2Obj, $ci3Obj, $ci4Obj, $ci5Obj, $ci6Obj, $ci7Obj;
    public $ci8Obj, $ci9Obj, $ci10Obj, $ci11Obj, $ci12Obj, $ci13Obj, $ci14Obj;
    public $sensoryexam_info;
    public $mdtre_info;
    public $pfirmangrade_info;
    public $vascore_info;
    public $modq_info;
    public $rmq_replies;

    //common to all
    public $activePatients;
    public $patient_uuid;
    public $ptEpoch;
    public $cardTittle;
    public $date_created;
    public $VAScore;

    public function render()
    {
        $this->activePatients = Patient::all();
        //dd($this->activePatients);
        return view('livewire.ctms.patients.patient-information');
    }

    public function selectedPatient($id)
    {
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        $this->patientInfoButtons = true;
        $this->TimelinePatient = false;
    }

    public function getPatientTimeline($id)
    {
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        //$this->ptEpoch = PatientEpoch::where('patient_uuid', $this->patient_uuid)->where('status', 'active')->get();
        //dd($this->ptEpoch);
        $this->patientInfoButtons = false;
        $this->TimelinePatient = true;
    }

        //respective forms
    public function fnShowPrimaryInfo($id)
    {
        $this->patientPrimaryInfo = Patient::where('patient_uuid', $id)->first();
        $this->cardTittle = "Patient Primary Information";
        $this->date_created = $this->patientPrimaryInfo->created_at;
        //dd($this->patientPrimaryInfo);
        //close all other open forms
        $this->fnResetAllVisiblePanels();
        $this->p1 = true;
    }

    public function fnLifeStyleData($id)
    {
        $this->ls_info = LifeStyle::where('patient_uuid', $id)->first();
        $this->cardTittle = "Life Style Observations";
        $this->date_created = $this->ls_info->created_at;
        //dd($this->patientPrimaryInfo);
        //close all other open forms 
        $this->fnResetAllVisiblePanels();
        $this->p2 = true;
    }

    public function fnClinicalInfo($id)
    {
        $this->clinical_info = ClinicalData::where('patient_uuid', $id)->first();
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->clinical_info->created_at;

        //now set for all other parameters
        $this->ci1Obj  = BloodRoutine::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci2Obj  = BloodSugar::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci3Obj  = BloodUrea::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci4Obj  = ChemicalExam::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci5Obj  = Creatinine::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci6Obj  = Crp::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci7Obj  = Electrolytes::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci8Obj  = GeneralSummary::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci9Obj  = Il6::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci10Obj = LaboratoryExam::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci11Obj = LiverFunction::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci12Obj = MicroscopicExam::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci13Obj = RenalFunction::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        $this->ci14Obj = UrineRoutine::where('status', 'draft')->where('patient_uuid', $this->patient_uuid)->first();
        //close all other open forms
        $this->fnResetAllVisiblePanels();
        $this->p3 = true;
    }

    public function fnSensoryExamInfo($id)
    {
        $this->sensoryexam_info = SensoryExamination::where('patient_uuid', $id)->first();
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->sensoryexam_info->created_at;
        $this->fnResetAllVisiblePanels();
        $this->p4 = true;
    }

    public function fnMDTRExamInfo($id)
    {
        $this->mdtre_info = Mdtre::where('patient_uuid', $id)->first();
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->mdtre_info->created_at;

        //dd("reached");
        $this->fnResetAllVisiblePanels();
        $this->p5 = true;
    }

    public function fnRadiographsInfo($id)
    {
        //dd("reached");
        $this->fnResetAllVisiblePanels();
        $this->p6 = true;
    }

    public function fnModifiedPfirmannInfo($id)
    {
        $this->pfirmangrade_info = PfirmannGrade::where('patient_uuid', $id)->first();
        //dd($this->pfirmangrade_info);
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->pfirmangrade_info;

        $this->fnResetAllVisiblePanels();
        $this->p7 = true;
    }

    public function fnVisualAnalogInfo($id)
    {
        $this->vascore_info = VAScore::where('patient_uuid', $id)->first();
        //dd($this->pfirmangrade_info);
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->vascore_info;

        $this->fnResetAllVisiblePanels();
        $this->p8 = true;
    }

    public function fnMODIQInfo($id)
    {
        $this->modq_info = ModqScore::where('patient_uuid', $id)->first();
        //dd($this->pfirmangrade_info);
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->modq_info->created_at;

        $this->fnResetAllVisiblePanels();
        $this->p9 = true;
    }

    
    public function fnRMQInfo($id)
    {
        $this->rmq_replies = RMQReply::where('patient_uuid', $id)->first();
        //dd($this->rmq_replies);
        $this->date_created = $this->rmq_replies->created_at;

        $this->fnResetAllVisiblePanels();
        $this->p10 = true;
    }

    public function fnResetAllVisiblePanels()
    {
        $this->p1 = false;
        $this->p2 = false;
        $this->p3 = false;
        $this->p4 = false;
        $this->p5 = false;
        $this->p6 = false;
        $this->p7 = false;
        $this->p8 = false;
        $this->p9 = false;
        $this->p10 = false;
    }
}
