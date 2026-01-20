<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormBloodUrea extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    
    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $urea = null;

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $blood_urea_nitrogen = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
    public $bubun_report_file = null;
 
    #[Validate('nullable|regex:/^[A-Za-z0-9\-_\/ ]+$/')]
    public $bubun_report_file_path = null;




    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}