<?php

namespace App\Livewire\Health;

use Livewire\Component;

use Livewire\WithFileUploads;

//models
use App\Models\Ctms\Patient;

class ManageHealth extends Component
{
    use WithFileUploads;
    //default panels
    public $message_panel = false;
    public $edit_button = false;

    //active patient panel
    public $activePatients, $patient_uuid;

    public $healthInfoButtons = false;

    public $newPatientEntrySteps = true;
    //Form openings
    //public $openNewPatientEntryForm = false;
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
    public $p12 = false;
    public $p13 = false;
    public $p14 = false;
    public $p15 = false;
    public $p16 = false;
    public $p17 = false;

    public $entry = "insert";

    //---------------------------------------------------------------//
    public function render()
    {
        $this->activePatients = Patient::where('status', 'draft')->get();

        return view('livewire.health.manage-health');
    }

    public function selectedPatient($id)
    {
        $this->patient_uuid = $id;
        //dd($this->patient_uuid);
        $this->healthInfoButtons = true;
    }

    // --- Panel - p1 --- //
    public function fnHLifeStyle()
    {
        $this->fnCloseAllPanels();
        $this->p1  = true;  //
    }
    // --- Panel - p2 --- //
    public function fnHClinicInvest()
    {
        $this->fnCloseAllPanels();
        $this->p2  = true;  //
    }
    // --- Panel - p3 --- //
    public function fnHSensoryExam()
    {
        $this->fnCloseAllPanels();
        $this->p3  = true; //
    }
    // --- Panel - p4 --- //
    public function fnHMDTRExam()
    {
        $this->fnCloseAllPanels();
        $this->p4  = true; //
    }
    // --- Panel - p5 --- //
    public function fnHMPfGrade()
    {
        $this->fnCloseAllPanels();
        $this->p5  = true; //
    }
    // --- Panel - p6 --- //
    public function fnHVAScore()
    {
        $this->fnCloseAllPanels();
        $this->p6  = true; //
    }
    // --- Panel - p7 --- //
    public function fnHMODIQScore()
    {
        $this->fnCloseAllPanels();
        $this->p7  = true; //
    }
    // --- Panel - p8 --- //
    public function fnHRMQScore()
    {
        $this->fnCloseAllPanels();
        $this->p8  = true; //
    }
    // --- Panel - p9 --- //
    public function fnHImages()
    {
        $this->fnCloseAllPanels();
        $this->p9 = true; //
    }
    // --- Panel - p10 --- //
    public function fnBlodRoutine()
    {
        $this->fnCloseAllPanels();
        $this->p10 = true; //
    }
    // --- Panel - p11 --- //
    public function fnLLftElect()
    {
        $this->fnCloseAllPanels();
        $this->p11 = true;
    }
    // --- Panel - p12 --- //
    public function fnRenFunct()
    {
        $this->fnCloseAllPanels();
        $this->p12 = true;
    }
    // --- Panel - p13 --- //
    public function fnBsCrpIl6()
    {
        $this->fnCloseAllPanels();
        $this->p13 = true;
    }
    // --- Panel - p14 --- //
    public function fnPathLab()
    {
        $this->fnCloseAllPanels();
        $this->p14 = true;
    }
    // --- Panel - p15 --- //
    public function fnChemExam()
    {
        $this->fnCloseAllPanels();
        $this->p15 = true;
    }
    // --- Panel - p16 --- //
    public function fnMicroExam()
    {
        $this->fnCloseAllPanels();
        $this->p16 = true;
    }
    // --- Panel - p17 --- //
    public function fnUrineRoutine()
    {
        $this->fnCloseAllPanels();
        $this->p17 = true;
    }

    public function fnCloseAllPanels()
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
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }




}

    


