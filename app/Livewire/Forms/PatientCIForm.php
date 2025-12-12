<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientCIForm extends Form
{

    #[Validate('required|max:3')]
    public $center_id = '1';

    #[Validate('max:3')]
    public $opd_id = '';

    #[Validate('max:3')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('numeric')]
    public $aadhar_id = '';

    #[Validate('alpha_num')]
    public $pan_num = '';

    #[Validate('alpha_num')]
    public $other_id = '';

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
    public $lab_report_file = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('alpha_num')]
    public $entry_date = '';
    
    #[Validate('alpha_num')]
    public $verified_by = '';

    #[Validate('alpha_num')]
    public $verified_date = '';

    #[Validate('alpha_num')]
    public $entry_sealed_by = '';

    #[Validate('alpha_num')]
    public $entry_sealed_date = '';
}