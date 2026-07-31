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

//forms
use App\Livewire\Forms\Decisions\DecisionProcessingForm;
use App\Livewire\Forms\Decisions\DecisionReportFiles;

//traits
use App\Traits\Base;
use Livewire\WithFileUploads;
use App\Traits\Fileuploads\TOldFileMove;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Logging
use Illuminate\Support\Facades\Log;

class EnrollmentDecisionComponent extends Component
{
    use Base;
    use WithFileUploads;
    use TOldFileMove;

    //form status
    public $data_type = null;
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    public $passObj, $enrObj;

    //Form bindings
    public DecisionProcessingForm $form;
    public DecisionReportFiles $form_x;

    public $bpath = "app/public";
    public $def_file_path = "skls/patients/";
    public $fileinfo = [], $input = [];

    //new paitent global uuid
    public $patient_uuid, $confirmed_patients;

    public $qc_report_1, $qc_report_2, $qc_report_3, $qc_coa, $qc_report_file_count = 0;

    public function mount($patient_uuid)
    {
        //dd($patient_uuid);
        $this->patient_uuid = $patient_uuid;
        $this->passObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->enrObj = Enrollment::where('patient_uuid', $this->patient_uuid)->first();
    }

    public function render()
    {
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Enrollment Decision home page');
        return view('livewire.ctms.patients.decision.enrollment-decision-component');
    }

    public function fnSaveDiscectomyData()
    {
        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        LivewireAlert::title("Discectomy info for Decision updated")->success()->show();
        //dd($this->patient_uuid, $filtered);
    }

    public function fnSaveDiscectomySamplesData()
    {
        //dd("reached 2 tab");
        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        LivewireAlert::title("Discectomy Sample info for Decision updated")->success()->show();
    }

    public function fnSaveEnrolQCData()
    {
        $repfiles = [];
        $qc_report_file_count = 0;
        //qc fileupload code to be inserted
        $this->form_x->validate();
        //dd("reached 2 tab");
        $fileinfo['file_path'] = $this->def_file_path.$this->patient_uuid.'/enrollment/valid/';
        $fileinfo['patient_uuid'] = $this->patient_uuid;
        $fileinfo['tags'] = null;
        $fileinfo['report_status'] = 'valid';
        $fileinfo['uploaded_by'] = Auth::user()->id;
        $fileinfo['date_created'] = date('Y-m-d');

        
        if ($this->form_x->qc_report_1) 
        {
            $fileinfo['report_category'] = 'enrollment_qc_report_1';
            $fileinfo['file_code'] = 881;
            $fileinfo['file_uuid'] = $this->fileUuid();
            $fileinfo['report_description'] = "QC report 1";
            $fileinfo['file_name'] = $this->generateCode(12).'.'.$this->form_x->qc_report_1->getClientOriginalExtension();
            //dd($fileinfo);
            //now check if file exists
            $oldfile = $this->getOldEnrollmentFileInfo($fileinfo['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $fileinfo);                 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_x->qc_report_1->storeAs($fileinfo['file_path'], $fileinfo['file_name'], 'public');
            $newFile = EnrollmentFiles::create($fileinfo);
            $this->form_x->qc_report_1 = null;
            //$this->iter1++;
            //dd($input, $oldfile);
            //LivewireAlert::title('QC Report 1 File Saved')->success()->asToast()->show();
            $repfiles['qc_report1_filename'] = $fileinfo['file_name'];
            $repfiles['qc_report1_file_path'] = $fileinfo['file_path'];
            $this->qc_report_file_count = $this->qc_report_file_count + 1;
        } 


        if ($this->form_x->qc_report_2) 
        {
            $fileinfo['report_category'] = 'enrollment_qc_report_2';
            $fileinfo['file_code'] = 882;
            $fileinfo['file_uuid'] = $this->fileUuid();
            $fileinfo['report_description'] = "QC report 2";
            $fileinfo['file_name'] = $this->generateCode(12).'.'.$this->form_x->qc_report_2->getClientOriginalExtension();
            //dd($fileinfo);
            //now check if file exists
            $oldfile = $this->getOldEnrollmentFileInfo($fileinfo['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $fileinfo);                 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_x->qc_report_2->storeAs($fileinfo['file_path'], $fileinfo['file_name'], 'public');
            $newFile = EnrollmentFiles::create($fileinfo);
            $this->form_x->qc_report_2 = null;
            //$this->iter1++;
            //dd($input, $oldfile);
            //LivewireAlert::title('QC Report 1 File Saved')->success()->asToast()->show();
            $repfiles['qc_report2_filename'] = $fileinfo['file_name'];
            $repfiles['qc_report2_file_path'] = $fileinfo['file_path'];
            $this->qc_report_file_count = $this->qc_report_file_count + 1;
        } 

        if ($this->form_x->qc_report_3) 
        {
            $fileinfo['report_category'] = 'enrollment_qc_report_3';
            $fileinfo['file_code'] = 883;
            $fileinfo['file_uuid'] = $this->fileUuid();
            $fileinfo['report_description'] = "QC report 3";
            $fileinfo['file_name'] = $this->generateCode(12).'.'.$this->form_x->qc_report_3->getClientOriginalExtension();
            //dd($fileinfo);
            //now check if file exists
            $oldfile = $this->getOldEnrollmentFileInfo($fileinfo['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $fileinfo);                 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_x->qc_report_3->storeAs($fileinfo['file_path'], $fileinfo['file_name'], 'public');
            $newFile = EnrollmentFiles::create($fileinfo);
            $this->form_x->qc_report_3 = null;
            //$this->iter1++;
            //dd($input, $oldfile);
            //LivewireAlert::title('QC Report 1 File Saved')->success()->asToast()->show();
            $repfiles['qc_report3_filename'] = $fileinfo['file_name'];
            $repfiles['qc_report3_file_path'] = $fileinfo['file_path'];
            $this->qc_report_file_count = $this->qc_report_file_count + 1;
        } 

        if ($this->form_x->qc_coa) 
        {
            $fileinfo['report_category'] = 'enrollment_qc_coa';
            $fileinfo['file_code'] = 884;
            $fileinfo['file_uuid'] = $this->fileUuid();
            $fileinfo['report_description'] = "QC coa";
            $fileinfo['file_name'] = $this->generateCode(12).'.'.$this->form_x->qc_coa->getClientOriginalExtension();
            //dd($fileinfo);
            //now check if file exists
            $oldfile = $this->getOldEnrollmentFileInfo($fileinfo['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $fileinfo);                 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_x->qc_coa->storeAs($fileinfo['file_path'], $fileinfo['file_name'], 'public');
            $newFile = EnrollmentFiles::create($fileinfo);
            $this->form_x->qc_coa = null;
            //$this->iter1++;
            //dd($input, $oldfile);
            //LivewireAlert::title('QC Report 1 File Saved')->success()->asToast()->show();
            $repfiles['qc_coa_filename'] = $fileinfo['file_name'];
            $repfiles['qc_coa_file_path'] = $fileinfo['file_path'];
            $this->qc_report_file_count = $this->qc_report_file_count + 1;
        } 


        $this->input = $this->form->all();
        $filtered = $this->filterInputNulls($this->input);
        $merged = array_merge($filtered, $repfiles);
        $merged['qc_infos_entered_by'] = Auth::user()->name;
        $merged['qc_infos_date_entered'] = date('Y-m-d');
        $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($merged);
        LivewireAlert::title("Discectomy Sample Info & [".$this->qc_report_file_count."] Files for Decision updated")->success()->show();
    }

    public function fnSaveEnrolQAData()
    {
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
       if($this->enrObj->enrollment_decision === "yes")
        {
            $this->input = $this->form->all();
            $filtered = $this->filterInputNulls($this->input);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
        }else{
            LivewireAlert::title("Patient NOT Enrolled")->warning()->show();
        }

    }

    public function fnSaveTransplantationData()
    {
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
