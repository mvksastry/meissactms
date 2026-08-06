<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormBloodSugar extends Form
{
    #[Validate('regex:/^[A-Za-z0-90-9 ]+$/|max:20')]
    public $opd_id = null;

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('date')]
    public $admission_date = null;

    #[Validate('nullable|numeric')]
    public $fasting;

    #[Validate('nullable|numeric')]
    public $post_prandial;

    #[Validate('nullable|numeric')]
    public $random;

//    #[Validate('nullable|regex:/^[a-zA-Z0-9_]+$/')]
//    public $bs_report_file = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}