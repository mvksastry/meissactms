<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientVAScoreForm extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;
    
    //#[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/|max:20')]
    //public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $vas_scale = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $fpr_scale = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $quality = null;


    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}