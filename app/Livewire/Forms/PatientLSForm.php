<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientLSForm extends Form
{
    #[Validate('alpha_num')]
    public $opd_id = '';

    #[Validate('alpha_num')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $cross_leg_sitting = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $standing = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $sitting = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ls3 = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ls4 = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ls5 = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ls6 = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $life_style_description = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}