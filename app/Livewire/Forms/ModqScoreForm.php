<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class ModqScoreForm extends Form
{
    #[Validate('required|max:5')]
    public $patient_uuid = '';
    
    #[Validate('required|max:5')]
    public $center_id = 1;

    #[Validate('required|max:5')]
    public $ctarm_id = 1;

    #[Validate('required|max:5')]
    public $opd_id = '';

    #[Validate('required|max:5')]
    public $in_patient_id = '';

    #[Validate('required|max:5')]
    public $admission_date = '';

    #[Validate('required|max:5')]
    public $aadhar_id = '';

    #[Validate('required|max:5')]
    public $pan_num = '';

    #[Validate('required|max:5')]
    public $other_id = '';


    
    #[Validate('required|max:5')]
    public $pain_intensity = '';

    #[Validate('required|max:5')]
    public $personal_care = '';

    #[Validate('required|max:5')]
    public $lifting = '';

    #[Validate('required|max:5')]
    public $walking = '';

    #[Validate('required|max:5')]
    public $sitting = '';

    #[Validate('required|max:5')]
    public $standing = '';

    #[Validate('required|max:5')]
    public $sleeping = '';

    #[Validate('required|max:5')]
    public $social_life = '';

    #[Validate('required|max:5')]
    public $travelling = '';

    #[Validate('required|max:5')]
    public $emp_home = '';



    #[Validate('required|max:5')]
    public $entered_by = '';

    #[Validate('required|max:5')]
    public $entry_date = '';

    #[Validate('required|max:5')]
    public $verified_by = '';

    #[Validate('required|max:5')]
    public $verified_date = '';

    #[Validate('required|max:5')]
    public $entry_sealed_by = '';

    #[Validate('required|max:5')]
    public $entry_sealed_date = '';
}    