<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientLSForm extends Form
{

    #[Validate('required|max:3')]
    public $center_id = '1';

    #[Validate('max:3')]
    public $opd_id = '';

    #[Validate('max:3')]
    public $inpatient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('numeric')]
    public $aadhar_id = '';

    #[Validate('alpha_num')]
    public $pan_num = '';

    #[Validate('alpha_num')]
    public $other_id = '';

    #[Validate('alpha_num')]
    public $cross_leg_sitting = '';

    #[Validate('alpha_num')]
    public $standing = '';

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

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('alpha_num')]
    public $entry_date = '';
    
    #[Validate('alpha_num')]
    public $verified_by = '';

    #[Validate('alpha_num')]
    public $verified_date = '';

    #[Validate('alpha_num')]
    public $entry_sealed_by = '';

    #[Validate('alpha_num')]
    public $entry_sealed_date = '';



}