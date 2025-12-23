<?php
 
namespace App\Livewire\Forms\Clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormChemExam extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $proteins = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $sugar = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $ketones = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $procalcitonin = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $bile_salts = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $bile_pigments = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $ce_report_file = '';



    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}