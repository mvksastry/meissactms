<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class ModqScoreForm extends Form
{
    #[Validate('alpha|max:45')]
    public $patient_uuid = '';
    
    #[Validate('numeric|max:5')]
    public $center_id = 1;

    #[Validate('numeric|max:5')]
    public $ctarm_id = 1;

    #[Validate('alpha_num|max:25')]
    public $opd_id = '';

    #[Validate('alpha_num|max:35')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('numeric|max:15')]
    public $aadhar_id = '';

    #[Validate('alpha_num|max:15')]
    public $pan_num = '';

    #[Validate('alpha_num|max:15')]
    public $other_id = '';


    
    #[Validate('alpha')]
    public $pain_intensity = '';

    #[Validate('alpha')]
    public $personal_care = '';

    #[Validate('alpha')]
    public $lifting = '';

    #[Validate('alpha')]
    public $walking = '';

    #[Validate('alpha')]
    public $sitting = '';

    #[Validate('alpha')]
    public $standing = '';

    #[Validate('alpha')]
    public $sleeping = '';

    #[Validate('alpha')]
    public $social_life = '';

    #[Validate('alpha')]
    public $travelling = '';

    #[Validate('alpha')]
    public $emp_home = '';



    #[Validate('alpha')]
    public $entered_by = '';

    #[Validate('alpha')]
    public $entry_date = '';

    #[Validate('alpha')]
    public $verified_by = '';

    #[Validate('alpha')]
    public $verified_date = '';

    #[Validate('alpha')]
    public $entry_sealed_by = '';

    #[Validate('alpha')]
    public $entry_sealed_date = '';
}    