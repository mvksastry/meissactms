<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class BsCrpIl6Form extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $fasting = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $random = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $post_prandial = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $bllodsugar_report_file = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $crp = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $crp_report_file = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $il6 = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $il6_report_file = '';

    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}