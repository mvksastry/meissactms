<?php

namespace App\Livewire\Ctms\Datareview;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\ClinicalReports;
use App\Models\Ctms\Decisions\Enrollment;
use App\Models\Ctms\Decisions\EnrollmentFiles;

//traits
use App\Traits\Base;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class DatarevReports extends Component
{

    use Base;
    //Trait binding

    //Form bindings
  
    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //Errors, Alers, Callouts

    public $cli_reps, $enr_files;

    public $c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,$c12;

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

    public $tab_name = [
        1 => 'Primary',
        2 => 'LifeStyle',
        3 => 'Clinical',
        4 => 'Sensory',
        5 => 'M & DTR',
        6 => 'Pfirmans',
        7 => 'Vis&Analog',
        8 => 'MODQ',
        9 => 'RMQ',
        10 => 'Misc1',
        11 => 'Misc2',
        12 => 'Enroll'
    ];

    public $clinArray = [ 31,32,33,34,35,36,37,38,39,40,41,42,43];

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        //$this->data_type = $data_type;

        $this->c1 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 1)->get();
        $this->c2 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 2)->get();
        
        $this->c4 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 4)->get();
        $this->c5 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 5)->get();
        $this->c6 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 6)->get();
        $this->c7 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 7)->get();
        $this->c8 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 8)->get();
        $this->c9 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 9)->get();
        $this->c10 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 10)->get();
        $this->c11 = ClinicalReports::where('patient_uuid', $this->patient_uuid)->where('file_code', 11)->get();

        $this->c12 = EnrollmentFiles::where('patient_uuid', $this->patient_uuid)->get();

        $this->c3 = ClinicalReports::where('patient_uuid', $this->patient_uuid)
                                    ->whereIn('file_code', $this->clinArray)
                                    ->get()->groupBy('file_code');
        //dd($this->c3);
        $this->processClinReports($this->c3);

    }

    public function render()
    {
        return view('livewire.ctms.datareview.datarev-reports');
    }

    public function processClinReports($c3)
    {
        //dd("reached");
    }

    public function fnDownLoadReport($file_uuid)
    {
        dd($file_uuid);
    }
}
