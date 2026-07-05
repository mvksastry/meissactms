<?php

namespace App\Livewire\Ctms\Patients\Edit;

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
//use App\Livewire\Forms\MdtreForm;

//traits, facades
use App\Traits\Base;

//logs
use Illuminate\Support\Facades\Log;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class EditPatientReports extends Component
{
    use Base;
    //use File;
    use WithFileUploads;

    //Form bindings
    //public UploadForm $form;

    public $bpath = "app/public";
    public $def_file_path = "skls/patients/";

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
    public $uuid, $file_uuid;
    public $current_files, $checkedall, $uncheckall, $state = false;

    public $includedReps = [], $all_in_one_file;

    public $primaryinfos, $lifestyle, $sensoryexam, $mdtre, $pfirmanscore, $vascore, $modqscore;
    public $rmqscore, $miscoff1, $miscoff2;

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
        $this->current_files = ClinicalReports::where('patient_uuid', $this->uuid)
                                                ->where('report_status', 'valid')
                                                ->get();
       // dd($this->current_files);
        //$this->form->entered_by = Auth::user()->name;
        return view('livewire.ctms.patients.edit.edit-patient-reports');
    }

    public function fnDownloadReport($id)
    {
        //dd($id);
        $rep_file = ClinicalReports::where('clinicalreport_id', $id)->first();
        //dd("reached", $rep_file);
        $file_path = "app/public/".$rep_file->file_path.$rep_file->file_name;
        //return Storage::disk('public')->download(storage_path($file_path), $rep_file->file_name);
        //return Storage::disk('public')->path($file_path)->download($rep_file->file_name);
        return response()->download(storage_path($file_path));
    }

    public function fileUuid()
    {
        $this->file_uuid = Str::uuid()->toString();
        return $this->file_uuid;
    }

    public function fnUploadPrimaryInfos()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->primaryinfos) 
        {
            $validatedData = $this->validate(
            [
                'primaryinfos'              => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'primaryinfos.primaryinfos' => 'The :attribute a .pdf file'
            ],
            [
                'primaryinfos'              => 'Primary Information'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');
            
            $input['file_code'] = 1;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->primaryinfos->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true); 
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            } 
            //looks like first time insertion go ahead.
            $path = $this->primaryinfos->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->primaryinfos = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Primary Info Data File saved...')->info()->asToast()->show();
            //session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            LivewireAlert::title('Primary Info Data File Not Found...')->warning()->asToast()->show();
        }
    }


    public function fnUploadlifestyleInfos()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->lifestyle) 
        {
            $validatedData = $this->validate(
            [
                'lifestyle'              => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'lifestyle.lifestyle' => 'The :attribute a .pdf file'
            ],
            [
                'lifestyle'              => 'Life Style'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');
            
            $input['file_code'] = 3;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->lifestyle->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();                
            }
            //looks like first time insertion go ahead.
            $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public');
            $newFile = ClinicalReports::insert($input);
            $this->lifestyle = null;
            $this->iter1++;
            LivewireAlert::title('Life Style Data File saved...')->info()->asToast()->show();
            //session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            LivewireAlert::title('Life Style Data Not Found...')->warning()->asToast()->show();
        }
    }

    public function updatedCheckedall($value) 
    {
        if($this->checkedall)
        {
            $this->state = true;
            $codex = array_slice($this->file_codex, 12, null, true);
            //dd($codex);
            foreach($codex as $key => $value)
            {
                $this->includedReps[] = $key;
            }
        }
        else {
            $this->state = false;
            $this->includedReps = [];
        }
    }

    public function updatedUncheckall($value)
    {
        $this->includedReps = [];
        $this->state = false;
    }

    public function fnUploadClinicalReports()
    {
        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // File #1
        if($this->all_in_one_file) 
        {
            $validatedData = $this->validate(
            [
                'all_in_one_file'              => 'nullable|file|mimes:pdf|max:6048',
            ],
            [
                'all_in_one_file.all_in_one_file' => 'The :attribute a .pdf file'
            ],
            [
                'all_in_one_file'              => 'All in One File'
            ]);

            $input['file_uuid'] = $this->fileUuid();
            $input['file_name'] = $this->generateCode(12).'.'.$this->all_in_one_file->getClientOriginalExtension();
            $input['file_path'] = $file_path;

            //first upload the file and then make an entry
            //looks like first time insertion go ahead.
            $path = $this->all_in_one_file->storeAs($file_path, $input['file_name'], 'public');
            //dd($input);
            foreach($this->includedReps as $val)
            {
                $input['file_code'] = $val;
                $input['report_description'] = $this->file_codex[$input['file_code']];
                $newFile = ClinicalReports::insert($input);
            }
            LivewireAlert::title('All in One File Saved...')->info()->asToast()->show();
            $this->all_in_one_file = null;
            $this->iter1++;
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #2
        // Check if $file is a Livewire temporary uploaded file
        if ($this->blood_routine) 
        {
            $validatedData = $this->validate(
            [
                'blood_routine'              => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'blood_routine.blood_routine' => 'The :attribute a .pdf file'
            ],
            [
                'blood_routine'              => 'Blood Routine'
            ]);
            
            $input['file_code'] = 31;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->blood_routine->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();
                //                
            } 
            //looks like first time insertion go ahead.
            $path = $this->blood_routine->storeAs($file_path, $input['file_name'], 'public');
            $newFile = ClinicalReports::insert($input);
            $this->blood_routine = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Blood Routine File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #3
        if ($this->blood_sugar)
        {
            $validatedData = $this->validate(
            [
                'blood_sugar'              => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'blood_sugar.blood_sugar' => 'The :attribute a .pdf file'
            ],
            [
                'blood_sugar'              => 'Blood Sugar'
            ]);

            $input['file_code'] = 32;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->blood_sugar->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();              
            }
            //looks like first time insertion go ahead.
            $path = $this->blood_sugar->storeAs($file_path, $input['file_name'], 'public');
            $newFile = ClinicalReports::insert($input);
            $this->blood_sugar = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Blood Routine File Saved...')->info()->asToast()->show();
            //session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #4
        if ($this->blood_urea) 
        {
            $validatedData = $this->validate(
            [
                'blood_urea'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'blood_urea.blood_urea' => 'The :attribute a .pdf file'
            ],
            [
                'blood_urea'            => 'Blood Urea'
            ]);
            
            $input['file_code'] = 33;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->blood_urea->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);
            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();             
            }
            //looks like first time insertion go ahead.
            $path = $this->blood_urea->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->blood_urea = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Blood Urea File Saved...')->info()->asToast()->show();
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            $this->file_count = $this->file_count + 1;
        }
        
        // File #5
        if ($this->chem_exams) 
        {
            $validatedData = $this->validate(
            [
                'chem_exams'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'chem_exams.chem_exams' => 'The :attribute a .pdf file'
            ],
            [
                'chem_exams'            => 'Chem Exams'
            ]);

            $input['file_code'] = 34;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->chem_exams->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->chem_exams->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->chem_exams = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Chem Exams File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }       

        // File #6
        if ($this->creatinine) 
        {
            $validatedData = $this->validate(
            [
                'creatinine'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'creatinine.creatinine' => 'The :attribute a .pdf file'
            ],
            [
                'creatinine'            => 'Creatinine'
            ]);

            $input['file_code'] = 35;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->creatinine->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->creatinine->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->creatinine = null;
            $this->iter1++;
            LivewireAlert::title('Creatinine Data File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #7
        if ($this->crp) 
        {
            $validatedData = $this->validate(
            [
                'crp'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'crp.crp' => 'The :attribute a .pdf file'
            ],
            [
                'crp'            => 'CRP'
            ]);
            
            $input['file_code'] = 36;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->crp->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->crp->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->crp = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('CRP Data File Saved...')->info()->asToast()->show();
            //session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #8
        if ($this->electrolytes) 
        {
            // Validate file
            $validatedData = $this->validate(
            [
                'electrolytes'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'electrolytes.electrolytes' => 'The :attribute a .pdf file'
            ],
            [
                'electrolytes'            => 'Electrolytes'
            ]);
            
            $input['file_code'] = 37;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->electrolytes->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->electrolytes->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->electrolytes = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('CRP Data File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #9
        if ($this->il6) 
        {
            $validatedData = $this->validate(
            [
                'il6'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'il6.il6' => 'The :attribute a .pdf file'
            ],
            [
                'il6'            => 'IL-6'
            ]);
            
            $input['file_code'] = 38;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->il6->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->il6->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->il6 = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('IL6 Data File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #10
        if ($this->lab_exams) 
        {
            $validatedData = $this->validate(
            [
                'lab_exams'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'lab_exams.lab_exams' => 'The :attribute a .pdf file'
            ],
            [
                'lab_exams'            => 'Lab Exams'
            ]);
            
            $input['file_code'] = 39;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->lab_exams->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile)
            {
                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();              
            }
            //looks like first time insertion go ahead.
            $path = $this->electrolytes->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->lab_exams = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Lab Exams Data File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #11
        if ($this->liver_function) 
        {
            $validatedData = $this->validate(
            [
                'liver_function'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'liver_function.liver_function' => 'The :attribute a .pdf file'
            ],
            [
                'liver_function'            => 'Liver Function'
            ]);
            
            $input['file_code'] = 40;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->liver_function->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->liver_function->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->liver_function = null;
            $this->iter1++;  
            //dd($input, $oldfile);
            LivewireAlert::title('Liver Function Data File Saved...')->info()->asToast()->show();
            //session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #12
        if ($this->microscopic_exam) 
        {
            $validatedData = $this->validate(
            [
                'microscopic_exam'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'microscopic_exam.microscopic_exam' => 'The :attribute a .pdf file'
            ],
            [
                'microscopic_exam'            => 'Microscopic Exam'
            ]);
            
            $input['file_code'] = 41;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->microscopic_exam->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->microscopic_exam->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->microscopic_exam = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Microscopic Exam Data File Saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #13
        if ($this->renal_function) 
        {
            $validatedData = $this->validate(
            [
                'renal_function'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'renal_function.renal_function' => 'The :attribute a .pdf file'
            ],
            [
                'renal_function'            => 'Renal Function'
            ]);
            
            $input['file_code'] = 42;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->renal_function->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();              
            }
            //looks like first time insertion go ahead.
            $path = $this->renal_function->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->renal_function = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Renal Function Data File saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        // File #14
        if ($this->urine_routine) 
        {
            $validatedData = $this->validate(
            [
                'urine_routine'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'urine_routine.urine_routine' => 'The :attribute a .pdf file'
            ],
            [
                'urine_routine'            => 'Urine Routine'
            ]);

            $input['file_code'] = 43;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->urine_routine->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->urine_routine->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->urine_routine = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Urine Routine Data File saved...')->info()->asToast()->show();
        } else {
            $this->file_count = $this->file_count + 1;
        }

        if($this->file_count == 14)
        {
            LivewireAlert::title('Files Not Found...')->warning()->asToast()->show();
        }
    }


    public function fnUploadSensoryExams()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->sensoryexam) 
        {
            $validatedData = $this->validate(
            [
                'sensoryexam'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'sensoryexam.sensoryexam' => 'The :attribute a .pdf file'
            ],
            [
                'sensoryexam'            => 'Sensory Exam'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');

            $input['file_code'] = 4;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->lifestyle->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->lifestyle = null;
            $this->iter1++;
            LivewireAlert::title('Urine Routine Data File saved...')->info()->asToast()->show();
        } else {
            LivewireAlert::title('Urine Routine Data File Not Found...')->warning()->asToast()->show();
        }
    }


    public function fnUploadMDTREInfo()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->mdtre) 
        {
            $validatedData = $this->validate(
            [
                'mdtre'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'mdtre.mdtre' => 'The :attribute a .pdf file'
            ],
            [
                'mdtre'            => 'MDTRE'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');

            $input['file_code'] = 5;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->mdtre->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();               
            }
            //looks like first time insertion go ahead.
            $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->mdtre = null;
            $this->iter1++;
            LivewireAlert::title('MDTRE Data File saved...')->info()->asToast()->show();
        } else {
            LivewireAlert::title('MDTRE Data File Not Found...')->warning()->asToast()->show();
        }
    }

    public function fnUploadPfirmanScore()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->pfirmanscore) 
        {
            $validatedData = $this->validate(
            [
                'pfirmanscore'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'pfirmanscore.pfirmanscore' => 'The :attribute a .pdf file'
            ],
            [
                'pfirmanscore'            => 'Pfirman Score'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');

            $input['file_code'] = 6;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->pfirmanscore->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();                
            }
            //looks like first time insertion go ahead.
            $path = $this->pfirmanscore->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->pfirmanscore = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Pfirman Score Data File saved...')->info()->asToast()->show();
        } else {
            LivewireAlert::title('Pfirman Score File Not Found...')->warning()->asToast()->show();
        }
    }

    public function fnUploadVAScore()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->vascore) 
        {
            $validatedData = $this->validate(
            [
                'vascore'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'vascore.vascore' => 'The :attribute a .pdf file'
            ],
            [
                'vascore'            => 'VA Score'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');

            $input['file_code'] = 7;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->vascore->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();              
            }
            //looks like first time insertion go ahead.
            $path = $this->vascore->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->vascore = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('VA Score Data File saved...')->info()->asToast()->show();
        } else {
            LivewireAlert::title('VA Score File Not Found...')->warning()->asToast()->show();
        }
    }


    public function fnUploadMODQScore()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->modqscore) 
        {
            $validatedData = $this->validate(
            [
                'modqscore'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'modqscore.modqscore' => 'The :attribute a .pdf file'
            ],
            [
                'modqscore'            => 'MODQ Score'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');    

            $input['file_code'] = 8;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->modqscore->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();                
            }
            //looks like first time insertion go ahead.
            $path = $this->modqscore->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->modqscore = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('MODQ Score Data File saved...')->info()->asToast()->show();
        } else {
            LivewireAlert::title('MODQ File Not Found...')->warning()->asToast()->show();
        }
    }

    public function fnUploadRMQScore()
    {
        // Check if $file is a Livewire temporary uploaded file
        if ($this->rmqscore) 
        {
            $validatedData = $this->validate(
            [
                'rmqscore'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'rmqscore.modqscore' => 'The :attribute a .pdf file'
            ],
            [
                'rmqscore'            => 'RMQ Score'
            ]);

            $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
            $input['patient_uuid'] = $this->uuid;
            $input['report_category'] = 'enrollment';
            $input['tags'] = null;
            $input['report_status'] = 'valid';
            $input['uploaded_by'] = Auth::user()->id;
            $input['date_created'] = date('Y-m-d');

            $input['file_code'] = 9;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->rmqscore->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();

                //now put new file in directory
                $path = $this->rmqscore->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->rmqscore = null;
                $this->iter1++;
                //                
            }
            //looks like first time insertion go ahead.
            $path = $this->rmqscore->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->rmqscore = null;
            $this->iter1++;
            LivewireAlert::title('RMQ Score Data File saved...')->info()->asToast()->show();
        } else {
            LivewireAlert::title('RMQ File Not Found...')->warning()->asToast()->show();
        }
    }

    public function fnUploadMiscFiles()
    {
        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->miscoff1) 
        {
            $validatedData = $this->validate(
            [
                'miscoff1'            => 'nullable|file|mimes:pdf|max:2048',
            ],
            [
                'miscoff1.miscoff1' => 'The :attribute a .pdf file'
            ],
            [
                'miscoff1'            => 'Misc Off1'
            ]);

            $input['file_code'] = 10;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->miscoff1->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();                
            }
            //looks like first time insertion go ahead.
            $path = $this->miscoff1->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->miscoff1 = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Misc Off-1 Data File saved...')->info()->asToast()->show();
        } else {
            $this->misc_file_count = $this->misc_file_count + 1;
        }

        // Check if $file is a Livewire temporary uploaded file
        if ($this->miscoff2) 
        {
            $validatedData = $this->validate(
            [
                'miscoff2'            => 'nullable|file|mimes:pdf|max:2t s048',
            ],
            [
                'miscoff2.miscoff2' => 'The :attribute a .pdf file'
            ],
            [
                'miscoff2'            => 'Misc Off2'
            ]);
            
            $input['file_code'] = 1;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->miscoff2->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/patients/".$this->uuid."/clinicals/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/patients/".$this->uuid."/clinicals/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();                
            }
            //looks like first time insertion go ahead.
            $path = $this->miscoff2->storeAs($file_path, $input['file_name'], 'public');

            $newFile = ClinicalReports::insert($input);
            $this->miscoff2 = null;
            $this->iter1++;
            //dd($input, $oldfile);
            LivewireAlert::title('Misc Off-1 Data File saved...')->info()->asToast()->show();
        } else {
            $this->misc_file_count = $this->misc_file_count + 1;
        }

        if( $this->misc_file_count == 2)
        {
            LivewireAlert::title('Misc Off Data Files Not Foundsaved...')->warning()->asToast()->show();
        }
    }

    public function getOldFileInfo($code)
    {
        return $oldfile = ClinicalReports::where('patient_uuid',$this->uuid)
                                    ->where('file_code', $code)
                                    ->where('report_status', 'valid')
                                    ->first();
    }


}
