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

    #[Validate('nullable|date')]
    public $admission_date = null;


    
    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $pain_intensity = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $personal_care = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $lifting = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $walking = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $sitting = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $standing = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $sleeping = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $social_life = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $travelling = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $emp_home = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $total = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $modq_score = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}    