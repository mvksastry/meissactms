<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientLSForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $cross_leg_sitting = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $standing = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $sitting = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls3 = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls4 = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls5 = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ls6 = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $life_style_description = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}