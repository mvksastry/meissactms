<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormBloodUrea extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $urea = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $blood_urea_nitrogen = null;

//  #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
//  public $bubun_report_file = null;
 
//  #[Validate('nullable|regex:/^[A-Za-z0-9\-_\/ ]+$/')]
//  public $bubun_report_file_path = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}