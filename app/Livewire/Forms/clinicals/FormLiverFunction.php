<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormLiverFunction extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    


    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $serum_total_protein = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $serum_albumin = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $globulin = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $ag_ratio = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $total_bilirubin = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $direct_bilirubin = null;


    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $indirect_bilirubin = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $sgot = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $sgpt = null;

    #[Validate('nullable|regex:/^[0-9.]+$/')]
    public $alkaline_phosphatase = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9\- \/]+$/')]
    public $lft_report_file = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9\- \/]+$/')]
    public $lft_report_file_path = '';


    
    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}