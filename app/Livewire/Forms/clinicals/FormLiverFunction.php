<?php
 
namespace App\Livewire\Forms;
 
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

    


    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $serum_total_protein = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $serum_albumin = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $globulin = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $ag_ratio = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $total_bilirubin = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $direct_bilirubin = '';


    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $indirect_bilirubin = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $sgot = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $sgpt = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $alkaline_phosphatase = '';

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