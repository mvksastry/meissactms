<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientLSForm extends Form
{
    #[Validate('max:3')]
    public $opd_id = '';

    #[Validate('max:3')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('alpha_num')]
    public $cross_leg_sitting = '';

    #[Validate('alpha_num')]
    public $standing = '';

    #[Validate('alpha_num')]
    public $sitting = '';

    #[Validate('alpha_num')]
    public $ls3 = '';

    #[Validate('alpha_num')]
    public $ls4 = '';

    #[Validate('alpha_num')]
    public $ls5 = '';

    #[Validate('alpha_num')]
    public $ls6 = '';

    #[Validate('alpha_num')]
    public $life_style_description = '';

    #[Validate('date')]
    public $comment_entered_by = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = '';
}