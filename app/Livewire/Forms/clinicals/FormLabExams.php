<?php
 
namespace App\Livewire\Forms\Clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormLabExams extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $esr = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $pt_patient = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $pt_control = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $inr = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $isi = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $path_report_file = '';



    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}