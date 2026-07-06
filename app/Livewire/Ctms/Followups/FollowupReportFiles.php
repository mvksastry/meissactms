<?php

namespace App\Livewire\Ctms\Followups;

use Livewire\Component;

use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

//Uuid import class
use Illuminate\Support\Str;

use File;
use Illuminate\Support\Facades\Storage;

//models
use App\Models\Ctms\ClinicalReports;

//forms
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Bloodroutine;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Bloodsugar;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Bloodurea;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Chemexam;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Creatinine;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Crp;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Electrolytes;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Il6;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Labexams;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Lifestyle;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Liverfunction;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Mdtrexam;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Microscopicexam;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Miscoff1;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Miscoff2;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\MODQscore;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Pfirmanscore;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Primaryinfos;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Renalfunction;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\RMQscore;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Sensoryexam;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\Urineroutine;
use App\Livewire\Forms\Ctms\Forms\Fileuploads\VAScore;

//use App\Livewire\Forms\MdtreForm;

//traits, facades
use App\Traits\Base;
use App\Traits\Fileuploads\TOldFileMove;

//logs
use Illuminate\Support\Facades\Log;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class FollowupReportFiles extends Component
{
    use Base;
    //use File;
    use WithFileUploads;
    use TOldFileMove;


    //Form bindings
    public Primaryinfos      $form_a;
    public Lifestyle         $form_b;

    public Allinoneclinicals $form_c;

    public BloodRoutine      $form_x;
    public Bloodsugar        $form_d;
    public Bloodurea         $form_e;
    public Chemexam          $form_f;
    public Creatinine        $form_g;
    public Crp               $form_h;
    public Electrolytes      $form_i;
    public Il6               $form_j;
    public Labexams          $form_k;
    public Liverfunction     $form_l;
    public Microscopicexam   $form_m;
    public Renalfunction     $form_p;
    public Urineroutine      $form_q;
    
    public Mdtreexam         $form_r;
    public MODQscore         $form_s;
    public Pfirmanscore      $form_t;
    public RMQscore          $form_u;
    public Sensoryexam       $form_v;
    public VAScore           $form_w;

    public Miscoff1          $form_n;
    public Miscoff2          $form_o;


    public $bpath = "app/public";
    public $def_file_path = "skls/patients/";
    public $input = [];

    public $file_codex = [
        0 => 'Default',
        1 => 'Primary Information related',
        2 => 'Life Style Description',
        3 => 'Clinical Investigation Reports',
        4 => 'Sensory Examinations',
        5 => 'M & DTR Examinations',
        6 => 'Pfirmans Grades',
        7 => 'Visual & Analog Scores',
        8 => 'MODQ Score',
        9 => 'RMQ Score',
        10 => 'Misc Official-1',
        11 => 'Misc Official-2',
        31 => 'Blood Routine',
        32 => 'Blood Sugar',
        33 => 'Blood Urea',
        34 => 'Chemical Examination',
        35 => 'Creatinine',
        36 => 'CRP',
        37 => 'Electrolytes',
        38 => 'IL6',
        39 => 'Laboratory Examinations',
        40 => 'Liver Function Tests',
        41 => 'Microscopic Examinations',
        42 => 'Renal Function Tests',
        43 => 'Urine Routine'
    ];

    //uuid of the patient
    public $uuid, $patient_uuid;
    public $current_files;
    public $data_type;

    public $fu_number;
    public $primaryinfos, $lifestyle, $sensoryexam, $mdtre, $pfirmanscore;
    public $vascore, $modqscore, $rmqscore, $miscoff1, $miscoff2;

    public $blood_routine, $blood_sugar, $blood_urea;
    public $chem_exams, $creatinine, $electrolytes, $crp, $il6, $lab_exams, $liver_function; 
    public $microscopic_exam, $renal_function, $urine_routine;

    public $iter1;

    public $file_count = 0, $misc_file_count = 0;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        //dd($this->uuid);
        $this->current_files = ClinicalReports::with('user')->where('patient_uuid', $this->patient_uuid)
                                                ->where('report_status', 'valid')
                                                ->get();
        //dd($this->current_files);
        $this->setFileBaseInfos();
        return view('livewire.ctms.followups.followup-report-files');
    }

    public function fnDownloadReport($id)
    {
        //dd($id);
        $rep_file = ClinicalReports::where('clinicalreport_id', $id)->first();
        //dd("reached", $rep_file);
        $file_path = "app/public/".$rep_file->file_path."/".$rep_file->file_name;
        //return Storage::disk('public')->download(storage_path($file_path), $rep_file->file_name);
        //return Storage::disk('public')->path($file_path)->download($rep_file->file_name);
        return response()->download(storage_path($file_path));
    }

    public function setFileBaseInfos()
    {
        $this->input['file_path'] = $this->def_file_path.$this->patient_uuid.'/clinicals/valid/followups';
        $this->input['patient_uuid'] = $this->patient_uuid;
        $this->input['report_category'] = 'follow-up-'.$this->data_type;
        $this->input['tags'] = null;
        $this->input['report_status'] = 'valid';
        $this->input['uploaded_by'] = Auth::user()->id;
        $this->input['date_created'] = date('Y-m-d');
    }

    public function fnUploadPrimaryInfos()
    {
        $this->form_a->validate();

        $input['file_code'] = 1;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_a->primaryinfos->getClientOriginalExtension();
        //merge base input and this
        $input = array_merge($input, $this->input);
        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code'], $input['report_category']);
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
        }
        //looks like first time insertion go ahead.
        $path = $this->form_a->primaryinfos->storeAs($input['file_path'], $input['file_name'], 'public');
        $newFile = ClinicalReports::insert($input);
        $this->form_a->primaryinfos = null;
        $this->iter1++;
        //dd($input, $oldfile);
        LivewireAlert::title('Primary Info File Saved')->success()->asToast()->show();
    }

    //represents form_b
    public function fnUploadlifestyleInfos()
    {
        $this->form_b->validate();

        $input['file_code'] = 3;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_b->lifestyle->getClientOriginalExtension();
        //dd($input);
        $input = array_merge($input, $this->input);
        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code'], $input['report_category']);
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
        }
        //looks like first time insertion go ahead.
        $path = $this->form_b->lifestyle->storeAs($file_path, $input['file_name'], 'public');
        $newFile = ClinicalReports::insert($input);
        $this->form_b->lifestyle = null;
        $this->iter1++;
        //dd($input, $oldfile);
        LivewireAlert::title('Life Style File Saved')->success()->asToast()->show();
    }

    public function fnUploadAllInOneFile()
    {
        $this->form_c->validate();
    }

    public function fnUploadClinicalReports()
    {   //File #1
        // Check if $file is a Livewire temporary uploaded file
        if ($this->form_x->blood_routine) 
        {
            $this->form_x->validate();

            $input['file_code'] = 31;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_x->blood_routine->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);                 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_x->blood_routine->storeAs($file_path, $input['file_name'], 'public');
            $newFile = ClinicalReports::insert($input);
            $this->form_x->blood_routine = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Blood Routine File Saved')->success()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

  
        //File #2 form_d
        if ($this->form_d->blood_sugar) 
        {
            $this->form_d->validate();

            $input['file_code'] = 32;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_d->blood_sugar->getClientOriginalExtension();
            //dd($input);
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);                  
            }
            //looks like first time insertion go ahead.
            $path = $this->form_d->blood_sugar->storeAs($file_path, $input['file_name'], 'public');
            $newFile = ClinicalReports::insert($input);
            $this->form_d->blood_sugar = null;
            $this->iter1++;
            LivewireAlert::title('Blood Sugar File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }

  
        //File #3
        if ($this->form_e->blood_urea) 
        {
            $this->form_e->validate();
            
            $input['file_code'] = 33;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_e->blood_urea->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
            }
            //looks like first time insertion go ahead.
            $path = $this->form_e->blood_urea->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_e->blood_urea = null;
            $this->iter1++;
            LivewireAlert::title('Blood Urea File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }

        //File #4
        if ($this->form_f->chem_exams) 
        {
            $this->form_f->validate();
            
            $input['file_code'] = 34;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_f->chem_exams->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);              
            }
            //looks like first time insertion go ahead.
            $path = $this->form_f->chem_exams->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_f->chem_exams = null;
            $this->iter1++;
            LivewireAlert::title('Chem Exam File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }        
 
   
        //File #5
        if ($this->form_g->creatinine) 
        {   
            $this->form_g->validate();
            
            $input['file_code'] = 35;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_g->creatinine->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);                 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_g->creatinine->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_g->creatinine = null;
            $this->iter1++;
            LivewireAlert::title('Creatinine File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }


        //File #6
        if ($this->form_h->crp) 
        {
            $this->form_h->validate();

            $input['file_code'] = 36;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_h->crp->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
            }
            //looks like first time insertion go ahead.
            $path = $this->form_h->crp->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_h->crp = null;
            $this->iter1++;
            LivewireAlert::title('CRP File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }


        //File #7
        if ($this->form_i->electrolytes) 
        {
            $this->form_i->validate();
            
            $input['file_code'] = 37;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_i->electrolytes->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);                
            }
            //looks like first time insertion go ahead.
            $path = $this->form_i->electrolytes->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_i->electrolytes = null;
            $this->iter1++;
            LivewireAlert::title('Electrolyte File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }


        //File #8
        if ($this->form_j->il6) 
        {
            $this->form_j->validate();
            
            $input['file_code'] = 38;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_j->il6->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
            }
            //looks like first time insertion go ahead.
            $path = $this->form_j->il6->storeAs($file_path, $input['file_name'], 'public');
            $newFile = ClinicalReports::insert($input);
            $this->form_j->il6 = null;
            $this->iter1++;
            LivewireAlert::title('IL-6 File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }


        //File #9
        if ($this->form_k->lab_exams) 
        {
            $this->form_k->validate();
            
            $input['file_code'] = 39;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_k->lab_exams->getClientOriginalExtension();
            $input = array_merge($input, $this->input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
            }
            //looks like first time insertion go ahead.
            $path = $this->form_k->lab_exams->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_k->lab_exams = null;
            $this->iter1++;
            LivewireAlert::title('Lab Exam File saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }

        //File #10
        if ($this->form_l->liver_function) 
        {
            $this->form_l->validate(); 

            $input['file_code'] = 40;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_l->liver_function->getClientOriginalExtension();
            $input = array_merge($input, $this->input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input);               
            }
            //looks like first time insertion go ahead.
            $path = $this->form_l->liver_function->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_l->liver_function = null;
            $this->iter1++;
            LivewireAlert::title('Liver Function File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }
        
        //File #11
        if ($this->form_m->microscopic_exam) 
        {
            $this->form_m->validate();

            $input['file_code'] = 41;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_m->microscopic_exam->getClientOriginalExtension();
            $input = array_merge($input, $this->input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_m->microscopic_exam->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_m->microscopic_exam = null;
            $this->iter1++;
            LivewireAlert::title('Microscopic Exam File Saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }

        //File #12
        if ($this->form_p->renal_function) 
        {
            $this->form_p->validate();

            $input['file_code'] = 42;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_p->renal_function->getClientOriginalExtension();
            $input = array_merge($input, $this->input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
               $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_p->renal_function->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_p->renal_function = null;
            $this->iter1++;
            LivewireAlert::title('Renal Function File saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }


        //File #13
        if ($this->form_q->urine_routine) 
        {
            $this->form_q->validate();

            $input['file_code'] = 43;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_q->urine_routine->getClientOriginalExtension();
            $input = array_merge($input, $this->input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
               $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_q->urine_routine->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_q->urine_routine = null;
            $this->iter1++;
            LivewireAlert::title('Urine Routine File saved')->success()->asToast()->show();
        }else {
            $this->file_count = $this->file_count + 1;
        }

        if($this->file_count == 13){
            LivewireAlert::title('Urine Routine File Not Found/Attached')->warning()->show();
        }

    }
    
    public function fnUploadMDTREInfo()
    {
        $this->form_r->validate();

        $input['file_code'] = 5;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_r->mdtre->getClientOriginalExtension();
        $input = array_merge($input, $this->input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code']);
        
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
        }
        //looks like first time insertion go ahead.
        $path = $this->form_r->mdtre->storeAs($file_path, $input['file_name'], 'public');

        $newFile = ClinicalReports::insert($input);
        $this->form_r->mdtre = null;
        $this->iter1++;
        LivewireAlert::title('M & DTR File saved')->success()->asToast()->show();
    }

    public function fnUploadMODQScore()
    {
        $this->form_s->validate();

        $input['file_code'] = 8;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_s->modqscore->getClientOriginalExtension();
        $input = array_merge($input, $this->input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code']);
        
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
        }
        //looks like first time insertion go ahead.
        $path = $this->form_s->modqscore->storeAs($file_path, $input['file_name'], 'public');

        $newFile = ClinicalReports::insert($input);
        $this->form_s->modqscore = null;
        $this->iter1++;
        LivewireAlert::title('MODQ Score File Saved')->success()->asToast()->show();
    }

    public function fnUploadPfirmanScore()
    {
        $this->form_t->validate();

        $input['file_code'] = 6;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_t->pfirmanscore->getClientOriginalExtension();
        $input = array_merge($input, $this->input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code']);
        
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
        }
        //looks like first time insertion go ahead.
        $path = $this->form_t->pfirmanscore->storeAs($file_path, $input['file_name'], 'public');

        $newFile = ClinicalReports::insert($input);
        $this->form_t->pfirmanscore = null;
        $this->iter1++;
        LivewireAlert::title('Pfirmann Score File saved')->success()->asToast()->show();
    }

    public function fnUploadRMQScore()
    {
        // Check if $file is a Livewire temporary uploaded file
        $this->form_u->validate();

        $input['file_code'] = 9;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_u->rmqscore->getClientOriginalExtension();
        $input = array_merge($input, $this->input);
        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code']);
        
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
        }
        //looks like first time insertion go ahead.
        $path = $this->form_u->rmqscore->storeAs($file_path, $input['file_name'], 'public');

        $newFile = ClinicalReports::insert($input);
        $this->form_u->rmqscore = null;
        $this->iter1++;
        LivewireAlert::title('R M Q Score File Saved')->success()->asToast()->show();
    }

    public function fnUploadSensoryExams()
    {
        $this->form_v->validate();

        $input['file_code'] = 4;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_v->lifestyle->getClientOriginalExtension();
        $input = array_merge($input, $this->input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code']);
        
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
        }
        //looks like first time insertion go ahead.
        $path = $this->form_v->sensoryexam->storeAs($file_path, $input['file_name'], 'public');

        $newFile = ClinicalReports::insert($input);
        $this->form_v->sensoryexam = null;
        $this->iter1++;
        LivewireAlert::title('Sensory Info File saved')->success()->asToast()->show();
    }

    public function fnUploadVAScore()
    {
        $this->form_w->validate();

        $input['file_code'] = 7;
        $input['file_uuid'] = $this->fileUuid();
        $input['report_description'] = $this->file_codex[$input['file_code']];
        $input['file_name'] = $this->generateCode(12).'.'.$this->form_w->vascore->getClientOriginalExtension();
        $input = array_merge($input, $this->input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($input['file_code']);
        
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
        }
        //looks like first time insertion go ahead.
        $path = $this->form_w->vascore->storeAs($file_path, $input['file_name'], 'public');

        $newFile = ClinicalReports::insert($input);
        $this->form_w->vascore = null;
        $this->iter1++;
        LivewireAlert::title('VA Score File Saved')->success()->asToast()->show();
    }

    public function fnUploadMiscFiles()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->form_n->miscoff1) 
        {
            $this->form_i->validate();
            $input['file_code'] = 10;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_n->miscoff1->getClientOriginalExtension();
            $input = array_merge($input, $this->input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_n->miscoff1->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_n->miscoff1 = null;
            $this->iter1++;
            LivewireAlert::title('Misc Off-1 File Saved')->success()->asToast()->show();
        } else {
            $this->misc_file_count = $this->misc_file_count + 1;
        }

        // Check if $file is a Livewire temporary uploaded file
        if ($this->form_o->miscoff2) 
        {            
            $this->form_i->validate();
            $input['file_code'] = 1;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->form_o->miscoff2->getClientOriginalExtension();
            $input = array_merge($input, $this->input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $result = $this->fnMoveOldFileToArchieve($oldfile, $input); 
            }
            //looks like first time insertion go ahead.
            $path = $this->form_o->miscoff2->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->form_o->miscoff2 = null;
            $this->iter1++;
            LivewireAlert::title('Misc Off-2 File Saved')->success()->asToast()->show();
        } else {
            $this->misc_file_count = $this->misc_file_count + 1;
        }

        if($this->misc_file_count == 2)
        {
            LivewireAlert::title('Misc 1 / 2 File(s) Not Found/Attached')->warning()->show();
        }

    }

    public function getOldFileInfo($code1, $code2)
    {
        return $oldfile = ClinicalReports::where('patient_uuid',$this->patient_uuid)
                                    ->where('file_code', $code1)
                                    ->where('report_category', $code2)
                                    ->where('report_status', 'valid')
                                    ->first();
    }












}
