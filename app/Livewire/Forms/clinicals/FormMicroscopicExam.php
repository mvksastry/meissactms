<?php
 
namespace App\Livewire\Forms\Clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormMicroscopicExam extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $pus_cells = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $epithelial_cells = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $rbcs = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $yeast_cells = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $bacteria = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $me_report_file = '';



    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}