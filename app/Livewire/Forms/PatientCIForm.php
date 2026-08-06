<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientCIForm extends Form
{

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = null;

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = null;
    
    //#[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/|max:20')]
    //public $subject_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $o_e = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $pr = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9. ]+$/')]
    public $temperature = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $bp_systolic = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $bp_diastolic = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $cvs = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $p_a = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $cns = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $cbc = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $esr = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $crp = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $rft = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $lft = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $clotting_time = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $bleeding_time = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $prothrombin_time = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $procalcitonin = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $laboratory_report_file = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('regex:/^[A-Za-z0-9 ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
    
}