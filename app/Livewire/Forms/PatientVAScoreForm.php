<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientVAScoreForm extends Form
{
    #[Validate('numeric')]
    public $opd_id = '';

    #[Validate('numeric')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('alpha_num')]
    public $intensity = '';

    #[Validate('alpha_num')]
    public $location = '';

    #[Validate('alpha_num')]
    public $onset = '';

    #[Validate('alpha_num')]
    public $duration = '';

    #[Validate('alpha_num')]
    public $variation = '';

    #[Validate('alpha_num')]
    public $quality = '';



    #[Validate('alpha_num')]
    public $comment_entered_by = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = null;
}