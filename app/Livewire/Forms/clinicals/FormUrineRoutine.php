<?php
 
namespace App\Livewire\Forms\Clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormUrineRoutine extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $physical_exam = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $quantity = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $colour = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $appearance = '';

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $ph = '';

    #[Validate('nullable|regex:/^[0-9. ]+$/')]
    public $specific_gravity = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
    public $me_report_file = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
    public $melr_report_file_path = '';

    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}