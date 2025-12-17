<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientVAScoreForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $intensity = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $location = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $onset = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $duration = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $variation = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $quality = '';



    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}