<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use App\Livewire\Forms\PatientForm;

class PatientRadiography extends Component
{
    //Form bindings
    public PatientForm $form;

    //image upload related
    public $image_category = null;
    public $uploadImage = false;
    public $imageInputFile;
    
    public function render()
    {
        return view('livewire.ctms.patients.patient-radiography');
    }

    public function fnUploadLSImages()
    {

    }

    public function fnUploadLSVideo()
    {

    }

    public function fnUploadXrayImage()
    {

    }

    public function fnUploadCTScanImage()
    {

    }

    public function fnUploadUSGImage()
    {

    }

    public function fnUploadMRIImage()
    {

    }
}
