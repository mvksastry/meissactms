<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class ModqScoreForm extends Form
{
    #[Validate('alpha_num|max:25')]
    public $opd_id = '';

    #[Validate('alpha_num|max:35')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;


    
    #[Validate('numeric')]
    public $pain_intensity = null;

    #[Validate('numeric')]
    public $personal_care = null;

    #[Validate('numeric')]
    public $lifting = null;

    #[Validate('numeric')]
    public $walking = null;

    #[Validate('numeric')]
    public $sitting = null;

    #[Validate('numeric')]
    public $standing = null;

    #[Validate('numeric')]
    public $sleeping = null;

    #[Validate('numeric')]
    public $social_life = null;

    #[Validate('numeric')]
    public $travelling = null;

    #[Validate('numeric')]
    public $emp_home = null;


    #[Validate('alpha_num')]
    public $comment_entered_by = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = null;
}    