<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientLSForm extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;
    
    #[Validate('nullable|date')]
    public $admission_date = null;

    
    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $cross_leg_sitting = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $standing = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $sitting = null;

    

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $life_style_description = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}