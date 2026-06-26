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
    public $current_files;

    public $includedReps = [], $all_in_one_file;

    public $blood_routine, $blood_sugar, $blood_urea;
    public $chem_exams, $creatinine, $electrolytes, $il6, $lab_exams, $liver_function; 
    public $microscopic_exam, $renal_function, $urine_routine;

    public $iter1;

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
        dd($id);
    }

    public function fileUuid()
    {
        $this->file_uuid = Str::uuid()->toString();
        return $this->file_uuid;
    }

    public function fnUploadPrimaryInfos()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->primaryinfos) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->primaryinfos->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->primaryinfos = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->primaryinfos->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->primaryinfos = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }


    public function fnUploadlifestyleInfos()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->lifestyle) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
            $input['file_code'] = 3;
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

                //now put new file in directory
                $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->lifestyle = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->lifestyle = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
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

        

        if($this->all_in_one_file) {

            //dd($this->includedReps);
            //dd($this->all_in_one_file);

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
            
            $this->all_in_one_file = null;
            $this->iter1++;
        }

        // Check if $file is a Livewire temporary uploaded file
        if ($this->blood_routine) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
            $input['file_code'] = 31;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->blood_routine->getClientOriginalExtension();
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
                $path = $this->blood_routine->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->blood_routine = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->blood_routine->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->blood_routine = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }

        if ($this->blood_sugar) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
            $input['file_code'] = 32;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->blood_sugar->getClientOriginalExtension();
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
                $path = $this->blood_sugar->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->blood_routine = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->blood_sugar->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->blood_sugar = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        }else {

        }

        if ($this->blood_urea) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
            $input['file_code'] = 33;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->blood_urea->getClientOriginalExtension();
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
                $path = $this->blood_urea->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->blood_urea = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->blood_urea->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->blood_urea = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        }else {

        }
        
 
        if ($this->chem_exams) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->chem_exams->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->chem_exams = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->chem_exams->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->chem_exams = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");

        }else {

        }        


        if ($this->creatinine) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->creatinine->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->creatinine = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->creatinine->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->creatinine = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");

        }else {

        }




        if ($this->crp) {

            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->crp->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->crp = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->crp->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->crp = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        }else {

        }

        if ($this->electrolytes) {

            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->electrolytes->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->electrolytes = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->electrolytes->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->electrolytes = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        }else {

        }

        if ($this->il6) {

            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->il6->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->il6 = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->il6->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->il6 = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        }else {

        }


        if ($this->lab_exams) {

            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
            $input['file_code'] = 39;
            $input['file_uuid'] = $this->fileUuid();
            $input['report_description'] = $this->file_codex[$input['file_code']];
            $input['file_name'] = $this->generateCode(12).'.'.$this->lab_exams->getClientOriginalExtension();
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
                $path = $this->lab_exams->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->lab_exams = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->electrolytes->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->lab_exams = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        }else {

        }




        if ($this->liver_function) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->liver_function->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->liver_function = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->liver_function->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->liver_function = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");

        }else {

        }


        

        if ($this->microscopic_exam) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->microscopic_exam->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->microscopic_exam = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->microscopic_exam->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->microscopic_exam = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");

        }else {

        }



        if ($this->renal_function) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->renal_function->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->renal_function = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->renal_function->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->renal_function = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");

        }else {

        }

        if ($this->urine_routine) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
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

                //now put new file in directory
                $path = $this->urine_routine->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->urine_routine = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->urine_routine->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->urine_routine = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");

        }else {

        }

    }


    public function fnUploadSensoryExams()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->sensoryexam) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->lifestyle = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->lifestyle = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }


    public function fnUploadMDTREInfo()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->mdtre) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->mdtre->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->mdtre = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->lifestyle->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->mdtre = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }

    public function fnUploadPfirmanScore()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->pfirmanscore) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->pfirmanscore->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->pfirmanscore = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->pfirmanscore->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->pfirmanscore = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }


    public function fnUploadVAScore()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->vascore) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->vascore->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->vascore = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->vascore->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->vascore = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }


    public function fnUploadMODQScore()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->modqscore) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->modqscore->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->modqscore = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->modqscore->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->modqscore = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }

    public function fnUploadRMQScore()
    {

        $file_path = $this->def_file_path.$this->uuid.'/clinicals/valid/';
        $input['patient_uuid'] = $this->uuid;
        $input['report_category'] = 'enrollment';
        $input['tags'] = null;
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->rmqscore) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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
            } else {
                //looks like first time insertion go ahead.
                $path = $this->rmqscore->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->rmqscore = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
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
        if ($this->miscoff1) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->miscoff1->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->miscoff1 = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->miscoff1->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->miscoff1 = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }

        // Check if $file is a Livewire temporary uploaded file
        if ($this->miscoff2) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            
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

                //now put new file in directory
                $path = $this->miscoff2->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = ClinicalReports::insert($input);
                $this->miscoff2 = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->miscoff2->storeAs($file_path, $input['file_name'], 'public');

                $newFile = ClinicalReports::insert($input);
                $this->miscoff2 = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
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
