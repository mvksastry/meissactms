<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\MdtreForm;

//Traits
use App\Traits\TCtms\TPatientMdtreData;

class PatientMdtre extends Component
{
    use TPatientMdtreData;

    //global patient uuid
    public $patient_uuid;

    //Form bindings
    public MdtreForm $form;

    //MDTRE variables
    public $hip_flexion_adduction, $knee_extension, $ankle_dorsiflexion, $decreased_patellar_reflex, $extensor_hallucis_longus; 
    public $hip_abduction, $ankle_plantar_flexion, $decreased_achilles_tendon_reflex, $straight_leg_raise, $contralateral_slr;
    public $femoral_nerve_stretch_test, $trendelenburg_gait, $antalgic_gait, $list;

    public function render()
    {
        return view('livewire.ctms.patients.patient-mdtre');
    }

    public function fnSaveMDTREInfo()
    {
        //dd("reached");
        $this->message_panel = true;
        $this->sysAlertSuccess = "Great working";
        $this->comSuccess = "Great working!";

        //dd($this->entered_by);
        $this->input = $this->form->all();
       // dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->saveMDTREInformation($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }
}
