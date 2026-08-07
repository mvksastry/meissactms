<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormChemExam extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
    public $proteins = null;

    #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
    public $sugar = null;

    #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
    public $ketones = null;

    #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
    public $procalcitonin = null;

    #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
    public $bile_salts = null;

    #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
    public $bile_pigments = null;

 //   #[Validate('nullable|regex:/^[a-zA-Z0-9. ]+$/')]
 //   public $ce_report_file = '';


    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}