<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientSEForm extends Form
{

    #[Validate('required|max:3')]
    public $center_id = '1';

    #[Validate('required|max:3')]
    public $ctarm_id = '1';

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