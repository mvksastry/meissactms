<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientSEForm extends Form
{

    #[Validate('alpha_num')]
    public $center_id = '1';

    #[Validate('alpha_num')]
    public $ctarm_id = '1';

    #[Validate('numeric')]
    public $opd_id = '';

    #[Validate('numeric')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('numeric')]
    public $aadhar_id = '';

    #[Validate('alpha_num')]
    public $pan_num = '';

    #[Validate('alpha_num')]
    public $other_id = '';


    #[Validate('alpha_num')]
    public $s1 = '';
    #[Validate('alpha_num')]
    public $l1 = '';
    #[Validate('alpha_num')]
    public $l2 = '';
    #[Validate('alpha_num')]
    public $l3 = '';
    #[Validate('alpha_num')]
    public $l4 = '';
    #[Validate('alpha_num')]
    public $l5 = '';


    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = '';
    
    #[Validate('alpha_num')]
    public $verified_by = '';

    #[Validate('date')]
    public $verified_date = '';

    #[Validate('alpha_num')]
    public $entry_sealed_by = '';

    #[Validate('date')]
    public $entry_sealed_date = '';


}