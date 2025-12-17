<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientCIForm extends Form
{

    #[Validate('alpha_num')]
    public $opd_id = '';

    #[Validate('alpha_num')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $oande = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $pr = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $temperature = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $bp_systolic = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $bp_diastolic = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $cvs = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $panda = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $cns = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $cbc = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $esr = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $crp = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $rft = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $lft = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $clotting_time = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $bleeding_time = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $prothrombin_time = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $procalcitonin = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $laboratory_report_file = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
    
}