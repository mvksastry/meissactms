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
    public function functionfnHLifeStyle()
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
    }


}

    


