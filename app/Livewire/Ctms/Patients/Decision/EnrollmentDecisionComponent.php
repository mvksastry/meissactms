<?php

namespace App\Livewire\Ctms\Patients\Decision;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;
use App\Models\Ctms\Decisions\EnrollmentFiles;
use App\Models\Common\Todo;

//forms
use App\Livewire\Forms\Decisions\DecisionProcessingForm;
use App\Livewire\Forms\Decisions\DecisionReportFiles;

//traits
use App\Traits\Base;
use Livewire\WithFileUploads;
use App\Traits\TCtms\TEnrollmentDecision;
use App\Traits\Fileuploads\TOldFileMove;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Logging
use Illuminate\Support\Facades\Log;

class EnrollmentDecisionComponent extends Component
{
    use Base;
    use WithFileUploads;
    use TEnrollmentDecision;
    use TOldFileMove;

    //form status
    public $data_type = null;
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    public $passObj, $enrObj, $enFileObj;

    //Form bindings
    public DecisionProcessingForm $form;
    public DecisionReportFiles $form_x;

    public $bpath = "app/public";
    public $def_file_path = "skls/patients/";
    public $fileinfo = [], $input = [];

    //new paitent global uuid
    public $patient_uuid, $confirmed_patients;

    public $qc_report_1, $qc_report_2, $qc_report_3, $qc_coa, $qc_report_file_count = 0;

        //variables
    public $tab, $activeTab; // default tab

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function mount($patient_uuid)
    {
        //dd($this->activeTab, $patient_uuid);
        $this->patient_uuid = $patient_uuid;
        $this->passObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->enrObj = Enrollment::where('patient_uuid', $this->patient_uuid)->first();
        $this->enFileObj = EnrollmentFiles::where('patient_uuid', $this->patient_uuid)->get();
    }

    public function render()
    {
        //dd($this->tab);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Enrollment Decision home page');
        return view('livewire.ctms.patients.decision.enrollment-decision-component');
    }

    public function fnSaveDiscectomyData()
    {
        $this->tab = 'tab_2';
        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        LivewireAlert::title("Discectomy info for Decision updated")->success()->show();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved Discectomy Info');
        //dd($this->patient_uuid, $filtered);
    }

    public function fnSaveDiscectomySamplesData()
    {
        $this->tab = 'tab_3';
        //dd("reached 2 tab");
        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        LivewireAlert::title("Discectomy Sample info for Decision updated")->success()->show();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved Discectomy Sample Info');
    }

    public function fnSaveEnrolQCData()
    {
        $this->tab = 'tab_4';
        $this->form_x->validate();
        $repfiles = [];
        $qc_report_file_count = 0;
        $fileinfo['patient_uuid'] = $this->patient_uuid;

        if ($this->form_x->qc_report_1) 
        {
            $fileinfo['file_code'] = 881;
            $result = $this->uploadEnrollemntFile($this->form_x->qc_report_1, $fileinfo);
            if($result['status'])
            {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_REP_1 For Decision');
                $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
            }else {
                LivewireAlert::titile($msg)->warning()->show();
            }
        } 


        if ($this->form_x->qc_report_2) 
        {
            $fileinfo['file_code'] = 882;
            $result = $this->uploadEnrollemntFile($this->form_x->qc_report_1, $fileinfo);
            if($result['status'])
            {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_REP_2 For Decision');
                $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
            }else {
                LivewireAlert::titile($msg)->warning()->show();
            }
        } 

        if ($this->form_x->qc_report_3) 
        {
            $fileinfo['file_code'] = 883;
            $result = $this->uploadEnrollemntFile($this->form_x->qc_report_1, $fileinfo);
            if($result['status'])
            {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_REP_3 For Decision');
                $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
            }else {
                LivewireAlert::titile($msg)->warning()->show();
            }
        } 

        if ($this->form_x->qc_coa) 
        {
            $fileinfo['file_code'] = 884;
            $result = $this->uploadEnrollemntFile($this->form_x->qc_report_1, $fileinfo);
            if($result['status'])
            {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_COA For Decision');
                $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
            }else {
                LivewireAlert::titile($msg)->warning()->show();
            }
        } 


        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $merged = array_merge($filtered, $repfiles);
        $merged['qc_infos_entered_by'] = Auth::user()->name;
        $merged['qc_infos_date_entered'] = date('Y-m-d');
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($merged);
        LivewireAlert::title("Discectomy QC info & [".$this->qc_report_file_count."] Files for Decision updated")->success()->show();
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Discectomy QC info & ['.$this->qc_report_file_count.'] Files');
    }

    public function fnSaveEnrolQAData()
    {
        $this->tab = 'tab_4';
        //dd("reached 4 tab");
        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $filtered['qa_infos_entered_by'] = Auth::user()->name;
        $filtered['qa_infos_date_entered'] = date('Y-m-d');
        //dd($filtered);
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        LivewireAlert::title("QA info for Decision updated")->success()->show();
    }

    public function fnSaveEnrollmentDecision()
    {
        $this->tab = 'tab_5';
        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);

        if(array_key_exists('enrollment_decision', $filtered))
        {
            $filtered['status'] = 'current';
            $filtered['status_date'] = date('Y-m-d');
            $filtered['decision_entered_by'] = Auth::user()->name;
            $filtered['decision_date_entered'] = date('Y-m-d');
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
            LivewireAlert::title("Decision Update")->success()->show();
        }else {
            LivewireAlert::title("Decision NOT Selected")->warning()->show();
        }
    }

    public function fnSaveEnrollmentIDs()
    {
        $this->tab = 'tab_6';
       if($this->enrObj->enrollment_decision === "yes")
        {
            $this->input = $this->form->all();
            $filtered = $this->filterInputNulls($this->input);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);

            //now we have create a ctms_activity entry? here??
            //when en enrollment id created, it be made visible to the respective teams???
            //best is to make an entry in todo list for team members.
            $newTodo = new Todo();
            $newTodo->user_id = Auth::user()->id;
            $newTodo->message = "New Patient Enrollment Done, Create MBR and other records";
            $newTodo->save();

        }else{
            LivewireAlert::title("Patient NOT Enrolled")->warning()->show();
        }

    }

    public function fnSaveTransplantationData()
    {
        $this->tab = 'tab_7';
        //query here whether or not decision taken and it is yes.
        //dd("reached 7 tab");
       if($this->enrObj->enrollment_decision === "yes")
        {
            $this->input = $this->form->all();
            $filtered = $this->filterInputNulls($this->input);
            $filtered['transplant_info_entered_by'] = Auth::user()->name;
            $filtered['transplant_info_date_entered'] = date('Y-m-d');
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        }else{
            LivewireAlert::title("Patient NOT Enrolled")->warning()->show();
        }
    }

    private function filterInputNulls($input)
    {
        $filtered = array_filter($input, function ($value) {
            // Define what "empty" means for your case
            return !($value === '' || $value === null);
        });

        return $filtered;
    }

    public function getOldEnrollmentFileInfo($code)
    {
        return $oldfile = EnrollmentFiles::where('patient_uuid',$this->patient_uuid)
                                    ->where('file_code', $code)
                                    ->where('report_status', 'valid')
                                    ->first();
    }
}
