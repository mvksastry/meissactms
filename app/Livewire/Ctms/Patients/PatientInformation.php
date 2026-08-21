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

use App\Models\Ctms\ClinicalReports;

//forms

//traits, classes
use Livewire\WithFileUploads;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

class PatientInformation extends Component
{
    //all traits, classes injected
    use WithFileUploads;

    //logged user
    public $logged_user;

    //default panels
    public $patientInfoButtons = false;
    public $TimelinePatient = false;
    public $PatientStatusPanel = false;

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

    public $p11 = false;

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

    public $current_files;

    //selected row highlighting
    public $selectedRow;
    public $data_type = "Pre-Enrollment";

    public function render()
    {
        if( Auth::user()->hasAnyRole(['clinical_dataentry', 'junior_resident']) )
		{
            $this->activePatients = Patient::where('status', 'draft')->get();
            $this->activePatients->search_status = "draft";
        }

        if( Auth::user()->hasAnyRole(['senior_resident']) )
		{
            $this->activePatients = Patient::where('status', 'draft')->get();
            $this->activePatients->search_status = "draft";
        }

        if( Auth::user()->hasAnyRole(['clinical_manager']) )
		{
            $this->activePatients = Patient::where('status', 'confirmed')->get();
            $this->activePatients->search_status = "confirmed";
        }

        if( Auth::user()->hasAnyRole(['ctms_incharge']) )
		{
            $this->activePatients = Patient::whereIn('status', ['verified'])->get();
            $this->activePatients->search_status = "approved/sealed";
        }

        if( Auth::user()->hasAnyRole(['cro']) )
		{
            $this->activePatients = Patient::where('status', 'sealed')->get();
            $this->activePatients->search_status = "sealed";
        }

        if( Auth::user()->hasAnyRole(['director']) )
		{
            $this->activePatients = Patient::whereIn('status', ['approved','sealed'])->get();
        }

        //dd($this->activePatients);
        return view('livewire.ctms.patients.patient-information');
    }

    public function selectedPatient($id)
    {
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        $this->patientInfoButtons = true;
        $this->p11 = false;
        $this->TimelinePatient = false;
        $this->PatientStatusPanel = false;
        $this->selectedRow = $id;
    }

    public function getPatientTimeline($id)
    {
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        //$this->ptEpoch = PatientEpoch::where('patient_uuid', $this->patient_uuid)->where('status', 'active')->get();
        //dd($this->ptEpoch);
        $this->patientInfoButtons = false;
        $this->fnResetAllVisiblePanels();
        $this->TimelinePatient = true;
        $this->PatientStatusPanel = false;
    }

    public function getCurrentPatientStatus($id)
    {   $this->patient_uuid = $id;
        //dd("reached");
        $this->patientInfoButtons = false;
        $this->TimelinePatient = false;
        $this->PatientStatusPanel = true;
    }

    #[On('closeStatusPanel')] 
    public function fnCloseStatusPanel()
    {
        $this->PatientStatusPanel = false;
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
        $this->ls_info = LifeStyle::where('patient_uuid', $id)->where('data_type', 'pre-enrollment')->first();
        $this->cardTittle = "Life Style Observations";
        $this->date_created = $this->ls_info->created_at;
        //dd($this->patientPrimaryInfo);
        //close all other open forms 
        $this->fnResetAllVisiblePanels();
        $this->p2 = true;
    }

    public function fnClinicalInfo($id)
    {
        $this->clinical_info = ClinicalData::where('patient_uuid', $id)->where('data_type', 'pre-enrollment')->first();
        $this->cardTittle = "Clinical Data";
        $this->date_created = $this->clinical_info->created_at;

        //now set for all other parameters
        $this->ci1Obj  = BloodRoutine::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci2Obj  = BloodSugar::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci3Obj  = BloodUrea::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci4Obj  = ChemicalExam::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci5Obj  = Creatinine::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci6Obj  = Crp::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci7Obj  = Electrolytes::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci8Obj  = GeneralSummary::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci9Obj  = Il6::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci10Obj = LaboratoryExam::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci11Obj = LiverFunction::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci12Obj = MicroscopicExam::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci13Obj = RenalFunction::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
        $this->ci14Obj = UrineRoutine::where('status', 'draft')
        ->where('patient_uuid', $this->patient_uuid)
        ->where('data_type', 'pre-enrollment')
        ->first();
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

    public function fnClinicalReports($id)
    {
        //dd("reached");
        //dd($this->uuid);
        $this->current_files = ClinicalReports::where('patient_uuid', $id)
                                                ->where('report_status', 'valid')
                                                ->get();
        //dd($this->current_files);
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

    public function fnDownloadReport($clinicalreport_id)
    {
        $rep_file = ClinicalReports::where('clinicalreport_id', $clinicalreport_id)->first();
        //dd("reached", $rep_file);
        $file_path = "app/public/".$rep_file->file_path.$rep_file->file_name;
        //return Storage::disk('public')->download(storage_path($file_path), $rep_file->file_name);
        //return Storage::disk('public')->path($file_path)->download($rep_file->file_name);
        return response()->download(storage_path($file_path));
    }
}
