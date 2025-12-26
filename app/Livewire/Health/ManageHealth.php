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
        $this->p1  = true;  //
        $this->p2  = false;
        $this->p3  = false;
        $this->p4  = false;
        $this->p5  = false;
        $this->p6  = false;
        $this->p7  = false;
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p2 --- //
    public function fnHClinicInvest()
    {
        $this->p1  = false;
        $this->p2  = true;  //
        $this->p3  = false;
        $this->p4  = false;
        $this->p5  = false;
        $this->p6  = false;
        $this->p7  = false;
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p3 --- //
    public function fnHSensoryExam()
    {
        $this->p1  = false;
        $this->p2  = false;
        $this->p3  = true; //
        $this->p4  = false;
        $this->p5  = false;
        $this->p6  = false;
        $this->p7  = false;
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p4 --- //
    public function fnHMDTRExam()
    {
        $this->p1  = false;
        $this->p2  = false;
        $this->p3  = false;
        $this->p4  = true; //
        $this->p5  = false;
        $this->p6  = false;
        $this->p7  = false;
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p5 --- //
    public function fnHMPfGrade()
    {
        $this->p1  = false;
        $this->p2  = false;
        $this->p3  = false;
        $this->p4  = false;
        $this->p5  = true; //
        $this->p6  = false;
        $this->p7  = false;
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p6 --- //
    public function fnHVAScore()
    {
        $this->p1  = false;
        $this->p2  = false;
        $this->p3  = false;
        $this->p4  = false;
        $this->p5  = false;
        $this->p6  = true; //
        $this->p7  = false;
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p7 --- //
    public function fnHMODIQScore()
    {
        $this->p1  = false;
        $this->p2  = false;
        $this->p3  = false;
        $this->p4  = false;
        $this->p5  = false;
        $this->p6  = false;
        $this->p7  = true; //
        $this->p8  = false;
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p8 --- //
    public function fnHRMQScore()
    {
        $this->p1  = false;
        $this->p2  = false;
        $this->p3  = false;
        $this->p4  = false;
        $this->p5  = false;
        $this->p6  = false;
        $this->p7  = false;
        $this->p8  = true; //
        $this->p9  = false;
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p9 --- //
    public function fnHImages()
    {
        $this->p1 = false;
        $this->p2 = false;
        $this->p3 = false;
        $this->p4 = false;
        $this->p5 = false;
        $this->p6 = false;
        $this->p7 = false;
        $this->p8 = false;

        $this->p9 = true; //

        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p10 --- //
    public function fnBlodRoutine()
    {
        $this->p10 = true;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p11 --- //
    public function fnLLftElect()
    {
        $this->p10 = false;
        $this->p11 = true;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p12 --- //
    public function fnRenFunct()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = true;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p13 --- //
    public function fnBsCrpIl6()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = true;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p14 --- //
    public function fnPathLab()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = true;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p15 --- //
    public function fnChemExam()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = true;
        $this->p16 = false;
        $this->p17 = false;
    }
    // --- Panel - p16 --- //
    public function fnMicroExam()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = true;
        $this->p17 = false;
    }
    // --- Panel - p17 --- //
    public function fnUrineRoutine()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
        $this->p14 = false;
        $this->p15 = false;
        $this->p16 = false;
        $this->p17 = true;
    }






}

    


