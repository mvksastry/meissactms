<?php

namespace App\Livewire\Ctms\Closures;

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

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;
//uploads
use Livewire\WithFileUploads;

class PatientRecordClosure extends Component
{

    public $patientClosure, $patient_uuid, $patientInfo, $enrollInfo;

    public $p1 = false;
    public $p2 = false;

    //data object variables
    public $id;

    public $highlightedId = null;

    public $activeTab;

    protected $listeners = [
        'closeP1P2' => 'closeAllPanels',
    ];


    public function render()
    {
        if( Auth::user()->hasAnyRole(['ctms_incharge']) )
        {
            $status = ['sealed','closed','exited'];
            $this->closureQuery($status);
        }
        if( Auth::user()->hasAnyRole(['director']) )
        {
            $status = ['sealed','closed','exited'];

            $this->closureQuery($status);
        }

        return view('livewire.ctms.closures.patient-record-closure');
    }

    public function closureQuery($status)
    {
        //$this->patientClosure = Patient::whereIn('status',$status)->get();
        //status_code > or = 400 means after 3 third follow-up done.
        $this->patientClosure = Patient::where('status_code','>=', 400)->get();
    }

    /*
    public function selectedPatient($id)
    {
        //dd($id);
        $this->patient_uuid = $id;
        $this->highlightedId = $id;
    }
    */

    public function openPanelP1($id)
    {
        //dd($id);
        $this->patient_uuid = $id;
        $this->highlightedId = $id;
        $this->closeAllPanels();
        $this->p1 = true;
    }

    public function openPanelP2($id)
    {
        $this->patient_uuid = $id;
        $this->highlightedId = $id;
        $this->closeAllPanels();
        $this->p2 = true;
    }

    public function closeAllPanels()
    {
        $p1 = false;
        $p2 = false;
    }

}
