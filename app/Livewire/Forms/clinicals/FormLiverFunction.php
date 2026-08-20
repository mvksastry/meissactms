<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormLiverFunction extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    


    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $serum_total_protein = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $serum_albumin = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $globulin = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $ag_ratio = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $total_bilirubin = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $direct_bilirubin = null;


    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $indirect_bilirubin = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $sgot = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $sgpt = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $alkaline_phosphatase = null;

   // #[Validate('nullable|regex:/^[A-Za-z0-9\- \/]+$/')]
   // public $lft_report_file = '';

   // #[Validate('nullable|regex:/^[A-Za-z0-9\- \/]+$/')]
   // public $lft_report_file_path = '';


    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}