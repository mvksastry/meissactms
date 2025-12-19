<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientCIForm extends Form
{

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $o_e = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $pr = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9. ]+$/')]
    public $temperature = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $bp_systolic = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $bp_diastolic = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $cvs = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $p_a = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $cns = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $cbc = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $esr = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $crp = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $rft = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $lft = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $clotting_time = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $bleeding_time = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $prothrombin_time = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $procalcitonin = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $laboratory_report_file = '';

    #[Validate('regex:/^[A-Za-z0-9 ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z0-9 ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
    
}