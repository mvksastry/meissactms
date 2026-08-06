<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormUrineRoutine extends Form
{
    #[Validate('regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $physical_exam = null;

    #[Validate('nullable|regex:/^-?\d+(\.\d+)?$/')]
    public $quantity = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $colour = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $appearance = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $deposits = null;

    #[Validate('nullable|regex:/^-?\d+(\.\d+)?$/')]
    public $ph = null;

    #[Validate('nullable|regex:/^-?\d+(\.\d+)?$/')]
    public $specific_gravity = null;

   // #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
   // public $me_report_file = '';

   // #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
   // public $melr_report_file_path = '';

    
    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}