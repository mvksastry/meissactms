<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientVAScoreForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = null;

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = null;
    
    //#[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/|max:20')]
    //public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $intensity = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $location = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $onset = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $duration = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $variation = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $quality = null;



    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}