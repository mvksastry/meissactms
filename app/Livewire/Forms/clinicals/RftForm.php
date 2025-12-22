<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class RftForm extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $sr_uric_acid = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $blood_urea = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $urea = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $blood_urea_nitrogen = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $serum_creatinine = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
    public $uricacid_report_file = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
    public $bubun_report_file = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9\-_ ]+$/')]
    public $creatine_report_file = '';

    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}