<?php

namespace App\Livewire\Ctms\Patients\Decision;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activity;
use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;
use App\Models\Ctms\Decisions\EnrollmentFiles;
use App\Models\Common\Todo;
use App\Models\Common\Chat;

//forms
use App\Livewire\Forms\Decisions\DecisionProcessingForm;
use App\Livewire\Forms\Decisions\DiscectomyForm;
use App\Livewire\Forms\Decisions\SampleEntryForm;
use App\Livewire\Forms\Decisions\DecisionReportFiles;
use App\Livewire\Forms\Decisions\Qc1DecisionForm;
use App\Livewire\Forms\Decisions\Qc2DecisionForm;
use App\Livewire\Forms\Decisions\QaDecisionForm;
use App\Livewire\Forms\Decisions\FinalDecisionForm;
use App\Livewire\Forms\Decisions\AdminDecisionForm;
use App\Livewire\Forms\Decisions\TransplantDecisionForm;

//traits
use App\Traits\Base;
use Livewire\WithFileUploads;
use App\Traits\TCtms\TEnrollmentDecision;
use App\Traits\Fileuploads\TOldFileMove;
use App\Traits\TCommentAppender;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Validator;
//Logging
use Illuminate\Support\Facades\Log;

class EnrollmentDecisionComponent extends Component
{
    use Base;
    use WithFileUploads;
    use TEnrollmentDecision;
    use TCommentAppender;
    use TOldFileMove;

    //form status
    public $data_type = null;
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    public $passObj, $enrObj, $enFileObj;

    //Form bindings
    public DiscectomyForm $form_a;
    public SampleEntryForm $form_b;
    public Qc1DecisionForm $form_d;
    public QaDecisionForm $form_e;
    public FinalDecisionForm $form_f;
    public AdminDecisionForm $form_g;
    public TransplantDecisionForm $form_h;
    public Qc2DecisionForm $form_i;


    //public DecisionProcessingForm $form;

    public DecisionReportFiles $form_x;

    public $bpath = "app/public";
    public $def_file_path = "skls/patients/";
    public $fileinfo = [], $input = [];

    //new paitent global uuid
    public $patient_uuid, $confirmed_patients;

    public $qc_report_1, $qc_report_2, $qc_report_3, $qc_coa, $qc_report_file_count = 0;
    public $qc_report1_description,$qc_report2_description,$qc_report3_description, $qc_coa_description;

        //variables
    public $tab, $activeTab; // default tab

    public $enrollment_decision, $decision_comment, $go = false;

    ///code dependent activation
    public $code170200, $code1112, $code1413, $code2019, $code2221;

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
        //dd($this->enFileObj);
        $this->fnGoNogo();
    }

    public function render()
    {
        //dd($this->tab);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Enrollment Decision home page');
        return view('livewire.ctms.patients.decision.enrollment-decision-component');
    }

    public function fnDownLoadQCfile($report_id)
    {
        //dd($report_id);
        $rep_file = EnrollmentFiles::where('file_uuid', $report_id)->first();
        //dd("reached", $rep_file);
        $file_path = "app/public/".$rep_file->file_path.$rep_file->file_name;
        //return Storage::disk('public')->download(storage_path($file_path), $rep_file->file_name);
        //return Storage::disk('public')->path($file_path)->download($rep_file->file_name);
        return response()->download(storage_path($file_path));
    }

    public function fnGoNogo()
    {
        $keysToCheck = [
            $this->enrObj->discec_status_code,
            $this->enrObj->discec_sample_status_code,
            $this->enrObj->qc_status_code,
            $this->enrObj->qa_status_code,
        ];

        $abort_steps = config('ctms.abort_steps');

        $missingKeys = array_diff_key($keysToCheck, array_keys($abort_steps));

        if (empty($missingKeys)) 
        {
            $this->go = true;
        } else {
            $this->go = false;
        }
        //dd($keysToCheck, $abort_steps, $missingKeys, $this->go);
    }


    public function fnUpdatePatientTableForStatus($status_code, $status_date)
    {
        $this->passObj->status_code = $status_code;
        $this->passObj->status_date = $status_date;
    }




    public function fnSaveDiscectomyData()
    {
        //dd($this->enrObj->discec_status_code);
        if($this->enrObj->stage_code >= 160 && $this->enrObj->stage_code < 200)
        {
            $this->form_a->validate();
            $this->input = $this->form_a->all();
            //dd($this->input);
            $filtered = $this->filterInputNulls($this->input);
            $filtered['disc_info_entered_by'] = Auth::user()->name;
            $filtered['disc_info_date_entered'] = date('Y-m-d');
            $filtered = $this->changeArrayKey($filtered, "code170200", "stage_code");
            $filtered['discec_status_code'] = $filtered['stage_code'];
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
            LivewireAlert::title("Discectomy info for Decision updated")->success()->show();
            Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved Discectomy Info');
            //dd($this->patient_uuid, $filtered);
        }else {
            LivewireAlert::title("Process NOT Reached the Step Or Elapsed")->warning()->show();
        }
    }

    public function fnSaveDiscectomySamplesData()
    {
        if($this->enrObj->stage_code == 200 && $this->enrObj->stage_code < 220 )
        {
            //dd("reached 2 tab");
            $this->form_b->validate();
            $this->input = $this->form_b->all();
            $filtered = $this->filterInputNulls($this->input);
            $filtered['discectomy_sample_info_entered_by'] = Auth::user()->name;
            $filtered['discectomy_sample_info_date_entered'] = date('Y-m-d');
            $filtered = $this->changeArrayKey($filtered, "code210220", "stage_code");
            $filtered['discec_sample_status_code'] = $filtered['stage_code'];
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
            LivewireAlert::title("Discectomy Sample info for Decision updated")->success()->show();
            Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved Discectomy Sample Info');
        }else {
            LivewireAlert::title("Process NOT Reached the Step Or Elapsed")->success()->show();
        }
    }
                    
    public function fnSaveEnrolQCPart1Data()
    {
        if($this->enrObj->stage_code == 220 && $this->enrObj->stage_code < 300)
        { 
            //$this->form_x->validate();
            $repfiles = [];
            $qc_report_file_count = 0;
            $fileinfo['patient_uuid'] = $this->patient_uuid;

            
            if ($this->form_x->qc_report_1) 
            {
                $this->validate([
                'form_x.qc_report_1' => 'required|file|mimes:pdf|max:5120', // 5MB
                ]);
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
                $this->validate([
                'form_x.qc_report_2' => 'required|file|mimes:pdf|max:5120', // 5MB
                ]);
                $fileinfo['file_code'] = 882;
                $result = $this->uploadEnrollemntFile($this->form_x->qc_report_2, $fileinfo);
                if($result['status'])
                {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_REP_2 For Decision');
                    $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
                }else {
                    LivewireAlert::titile($msg)->warning()->show();
                }
            } 
            
            $this->form_d->validate();
            $this->input = $this->form_d->all();
            $filtered = $this->filterInputNulls($this->input);
            $merged = array_merge($filtered, $repfiles);
            $merged['qc_infos_entered_by'] = Auth::user()->name;
            $merged['qc_infos_date_entered'] = date('Y-m-d');
            $filtered = $this->changeArrayKey($filtered, "code230240", "stage_code");
            $filtered['qc_status_code'] = $filtered['stage_code'];
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);

            LivewireAlert::title("Discectomy QC info & [".$this->qc_report_file_count."] Files for Decision updated")->success()->show();
            Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Discectomy QC info & ['.$this->qc_report_file_count.'] Files');
        
        } else {
            LivewireAlert::title("QC Step Not Reached or Elapsed")->warning()->show();
        }
    }



    public function fnSaveEnrolPart2QCData()
    {
        //dd($this->enrObj->stage_code);
        if($this->enrObj->stage_code > 220 && $this->enrObj->stage_code < 300)
        { 
            //$this->form_x->validate();
            $repfiles = [];
            $qc_report_file_count = 0;
            $fileinfo['patient_uuid'] = $this->patient_uuid;

            if ($this->form_x->qc_report_3) 
            {
                $this->validate([
                'form_x.qc_report_3' => 'file|mimes:pdf|max:5120', // 5MB
                ]);
                $fileinfo['file_code'] = 883;
                $result = $this->uploadEnrollemntFile($this->form_x->qc_report_3, $fileinfo);
                if($result['status'])
                {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_REP_3 For Decision');
                    $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
                }else {
                    LivewireAlert::titile($msg)->warning()->show();
                }
            } 

            if ($this->form_x->qc_coa) 
            {
                $this->validate([
                'form_x.qc_coa' => 'file|mimes:pdf|max:5120', // 5MB
                ]);
                $fileinfo['file_code'] = 884;
                $result = $this->uploadEnrollemntFile($this->form_x->qc_coa, $fileinfo);
                if($result['status'])
                {   Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Saved QC_COA For Decision');
                    $repfiles['qc_report_file_count'] = $this->qc_report_file_count + 1;
                }else {
                    LivewireAlert::titile($msg)->warning()->show();
                }
            } 

            $this->form_i->validate();
            $this->input = $this->form_i->all();
            $filtered = $this->filterInputNulls($this->input);
            $merged = array_merge($filtered, $repfiles);
            $merged['qc_infos_entered_by'] = Auth::user()->name;
            $merged['qc_infos_date_entered'] = date('Y-m-d');
            $filtered = $this->changeArrayKey($filtered, "code280300", "stage_code");
            $filtered['qc_status_code'] = $filtered['stage_code'];
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
            $this->reset();
            LivewireAlert::title("Discectomy QC info & [".$this->qc_report_file_count."] Files for Decision updated")->success()->show();
            Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Discectomy QC info & ['.$this->qc_report_file_count.'] Files');
        
        } else {
            LivewireAlert::title("QC Step Not Reached or Elapsed")->warning()->show();
        }
    }

    public function fnSaveEnrolQAData()
    {
        if($this->enrObj->stage_code == 300 && $this->enrObj->stage_code < 320)
        {

            //dd("reached 4 tab");
            $this->form_e->validate();
            $this->input = $this->form_e->all();
            $filtered = $this->filterInputNulls($this->input);
            $filtered['qa_infos_entered_by'] = Auth::user()->name;
            $filtered['qa_infos_date_entered'] = date('Y-m-d');
            $filtered = $this->changeArrayKey($filtered, "code310320", "stage_code");
            $filtered['qa_status_code'] = $filtered['stage_code'];
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
            $this->reset();
            LivewireAlert::title("QA info for Decision updated")->success()->show();

        }else {
            LivewireAlert::title("Step Not Reached or Elapsed")->warning()->show();
        }
    }

    public function fnSaveEnrollmentDecision()
    {
        //dd($this->enrObj->stage_code);
        $flag = $this->fnGoNogo();

        if($this->go)
        {
            if($this->enrObj->stage_code == 320 || $this->enrObj->stage_code == 340)
            {
                //dd("inside");
                $this->form_f->validate();
                $this->input = $this->form_f->all();
                $filtered = $this->filterInputNulls($this->input);          

                if(array_key_exists('enrollment_decision', $filtered))
                {
                    $codes = config('ctms.steps'); 
                    $filtered['status_date'] = date('Y-m-d');
                    $this->enrObj->stage_code = $filtered['enrollment_decision'];
                    $this->enrObj->enrollment_decision = $codes[$filtered['enrollment_decision']];
                    $this->enrObj->status_date = date('Y-m-d');
                    //get the code of the 
                    

                    if( Auth::user()->hasAnyRole(['ctms_incharge']) )
		            {
                        //$filtered['status'] = 'pending';
                        //$filtered['decision_entered_by'] = Auth::user()->name;
                        //$filtered['decision_date_entered'] = date('Y-m-d');
                        //dd($filtered);
                        $this->enrObj->status = 'pending';

                        $this->enrObj->appendComment('decision_comment', $filtered['comment_decision']);
                        $this->enrObj->decision_entered_by = Auth::user()->name;
                        $this->enrObj->decision_date_entered = date('Y-m-d');
                        //dd($filtered['comment_decision'], $this->enrObj);
                        $this->enrObj->save();
                        //$qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
                        LivewireAlert::title("In-Charge: Enrollment Decision Updated")->success()->show();
                    }

                    if( Auth::user()->hasAnyRole(['director']) )
		            {
                        $this->enrObj->status = 'approved';
                        $this->enrObj->appendComment('decision_comment', $filtered['comment_decision']);
                        $this->enrObj->approved_by = Auth::user()->name;
                        $this->enrObj->approved_date = date('Y-m-d');
                        //dd($filtered['comment_decision'], $this->enrObj);
                        $this->enrObj->save();
                        LivewireAlert::title("Director: Enrollment Decision Updated")->success()->show();
                    }
                    $this->form_f->reset();
                }else {
                    LivewireAlert::title("Decision NOT Selected")->warning()->show();
                }
            }else{
                LivewireAlert::title("Stage NOT Reached or Elapsed")->warning()->show();
            }
        }else {
            LivewireAlert::title("Failed Steps Found, Aborting Enrollment")->warning()->show();
            //code for aborting here.
        }

    }

    public function fnSaveEnrollmentIDs()
    {
        if($this->enrObj->stage_code == 340)
        {
            $this->form_g->validate();
            $this->input = $this->form_g->all();
            $filtered = $this->filterInputNulls($this->input);
            $filtered['stage_code'] = 350;
            //dd($filtered);
            $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);

            //now we have update ctms_activity table here. Why? 
            // an entry on this patient must be there and hence update it.
            //steps first query the activity table.
            $ctms_patient_entry = Activity::where('patient_uuid', $this->patient_uuid)
                                            ->where('code', 'mfg')->first();
            if($ctms_patient_entry === null)
            {

            }else{
                $ctms_patient_entry->mbr_id = $this->filtered['mbr_id'];
                $ctms_patient_entry->save();
            }

            //when en enrollment id created, it be made visible to the respective teams???
            //best is to make an entry in todo list for team members.
            $newChat = new Chat();
            $newChat->user_id = Auth::user()->id;
            $newChat->message = "New Patient Enrollment Done, Update MBR and other records";
            $newChat->save();
            LivewireAlert::title("Assigned Administrative Ids")->success()->show();
            $this->form_g->reset();
        }else{
            LivewireAlert::title("Step Not Reached or Elapsed")->warning()->show();
        }
        

    }

    public function fnSaveTransplantationData()
    {
        if($this->enrObj->stage_code == 350 && $this->enrObj->stage_code < 370)
        {
            $steps = config('ctms.steps');
            //query here whether or not decision taken and it is yes.
            //dd("reached 7 tab");

                $this->form_h->validate();
                $this->input = $this->form_h->all();
                $filtered = $this->filterInputNulls($this->input);
                $filtered['transplant_info_entered_by'] = Auth::user()->name;
                $filtered['transplant_info_date_entered'] = date('Y-m-d');
                $filtered['stage_code'] = $filtered['transplant_status'];
                $filtered['transplant_status'] = $steps[$filtered['transplant_status']];
                //dd($filtered);
                $qr = Enrollment::where('patient_uuid', $this->patient_uuid)->update($filtered);
                LivewireAlert::title("Transplant Status Updated! This Completes Enrollment")->success()->show();
                $this->form_h->reset();
        }else{
            LivewireAlert::title("Step Not Reached or Elapsed")->warning()->show();
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

    /**
         * Change a specific key in an associative array while keeping its value.
         *
         * @param array  $array     The original array
         * @param string $oldKey    The key to replace
        * @param string $newKey    The new key name
        * @return array            The updated array
        */
        public function changeArrayKey(array $array, string $oldKey, string $newKey): array {
            if (!array_key_exists($oldKey, $array)) {
                // If the old key doesn't exist, return the array unchanged
                //dd($array);
                return $array;
            }

            // Preserve the order of the array
            $keys = array_keys($array);
            $keys[array_search($oldKey, $keys, true)] = $newKey;

            // Combine new keys with old values
            //dd($keys);
            return array_combine($keys, array_values($array));
        }
}
