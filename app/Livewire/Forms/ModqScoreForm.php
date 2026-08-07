<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class ModqScoreForm extends Form
{
    #[Validate('required|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('required|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('required|date')]
    public $admission_date = null;


    
    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $pain_intensity = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $personal_care = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $lifting = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $walking = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $sitting = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $standing = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $sleeping = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $social_life = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $travelling = null;

    #[Validate('nullable|numeric|regex:/^\d+(\.\d+)?$/')]
    public $employment_home_making = null;


    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('required|date')]
    public $entry_date = null;
}    