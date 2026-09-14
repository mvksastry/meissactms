<?php

namespace App\Livewire\Ctms\Closures;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;
use App\Models\Archieve;

//Livewire Alerts
use App\Traits\Base;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use App\Traits\TCtms\TZipClosure;
//Logging
use Illuminate\Support\Facades\Log;

class PatientDataArchivals extends Component
{
    use Base, TZipClosure;

    public $patient_uuid;
    public $patientInfo;
    public $enrollInfo;
    public $curArchieves;
    public $initiated_by;
    public $date_initiated;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $this->patientInfo = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->enrollInfo = Enrollment::where('patient_uuid', $this->patient_uuid)->first();
        $this->fetchArchieveAccess();
    }

    public function render()
    {
        return view('livewire.ctms.closures.patient-data-archivals');
    }

    public function preparePatentDataZipArchieve($uuid)
    {
        $skls_id = $this->enrollInfo->patient_unique_id;

        if($this->curArchieves)
        {
            $result = $this->zipAndMove($uuid, $this->patientInfo,  $skls_id);
            // Decode to PHP associative array
        }
        else {
            LivewireAlert::title("Already Archieved: No More Changes Possible")->warning()->show();
        }
    }

    public function downloadPatientDataZipArchieve()
    {
        $relativePath = $this->curArchieves->file_path.'/'. $this->curArchieves->filename;
        $absolutePath = storage_path($relativePath); // ✅ Full path

        // Check if file exists
        if (!file_exists($absolutePath)) {
            LivewireAlert::title('File Not Found')->warning()->show();
            return;
        } else {
            //dd($absolutePath);
            $this->curArchieves->appendComment('accessed_by', "Downloaded");
            $this->curArchieves->date_accessed = date('Y-m-d');
            //dd($this->curArchieves);
            $this->curArchieves->save();
            $this->fetchArchieveAccess();
            return response()->download($absolutePath);  
        }
    }

    public function fetchArchieveAccess()
    {
        $this->curArchieves = Archieve::where('patient_uuid',  $this->patient_uuid)->first();
    }
}
