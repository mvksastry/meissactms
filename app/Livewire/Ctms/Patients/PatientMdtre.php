<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\MdtreForm;

//Traits
use App\Traits\TCtms\TPatientMdtreData;

use App\Traits\TCtms\TPatientLifeStyle;

use App\Models\Ctms\Patient;

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

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $newObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->form->opd_id = $newObj->opd_id;
        $this->form->in_patient_id = $newObj->in_patient_id;
        $this->form->admission_date = $newObj->admission_date;
        $this->form->entered_by = $newObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.ctms.patients.patient-mdtre');
    }

    public function fnSaveMDTREInfo()
    {
        //dd("reached");

        //dd($this->entered_by);
        $this->input = $this->form->all();
       //dd($this->input); // ['title' => '...', 'content' => '...']
        $result = $this->saveMDTREInformation($this->input);

        //dd($result); // ['title' => '...', 'content' => '...']
        $this->message_panel = true;
        $this->sysAlertSuccess = $result;
        $this->comSuccess = "Great working!";
    }
}
