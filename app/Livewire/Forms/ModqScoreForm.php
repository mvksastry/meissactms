<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class ModqScoreForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;


    
    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $pain_intensity = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $personal_care = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $lifting = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $walking = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $sitting = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $standing = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $sleeping = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $social_life = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $travelling = null;

    #[Validate('nullable|regex:/^[0-5 ]+$/')]
    public $employment_home_making = null;
/*
    #[Validate('numeric')]
    public $total = null;

    #[Validate('regex:/^[0-9. ]+$/')]
    public $modq_score = null;
*/
    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}    