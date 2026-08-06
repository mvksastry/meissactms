<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientLSForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = null;

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = null;
    
    //#[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/|max:20')]
    //public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $cross_leg_sitting = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $standing = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $sitting = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls3 = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls4 = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls5 = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls6 = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $life_style_description = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}