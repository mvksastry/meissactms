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

    #[Validate('date')]
    public $admission_date = null;

    #[Validate('numeric')]
    public $oande = '';

    #[Validate('alpha_num')]
    public $pr = '';

    #[Validate('alpha_num')]
    public $temperature = '';

    #[Validate('numeric')]
    public $bp_systolic = '';

    #[Validate('alpha_num')]
    public $bp_diastolic = '';

    #[Validate('alpha_num')]
    public $cvs = '';

    #[Validate('numeric')]
    public $panda = '';

    #[Validate('alpha_num')]
    public $cns = '';

    #[Validate('alpha_num')]
    public $cbc = '';

    #[Validate('numeric')]
    public $esr = '';

    #[Validate('alpha_num')]
    public $crp = '';

    #[Validate('alpha_num')]
    public $rft = '';

    #[Validate('numeric')]
    public $lft = '';

    #[Validate('alpha_num')]
    public $clotting_time = '';

    #[Validate('alpha_num')]
    public $bleeding_time = '';

    #[Validate('numeric')]
    public $prothrombin_time = '';

    #[Validate('alpha_num')]
    public $procalcitonin = '';

    #[Validate('alpha_num')]
    public $laboratory_report_file = '';

    #[Validate('alpha_num')]
    public $comment_entered_by = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = null;
    
}