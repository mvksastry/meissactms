<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientSEForm extends Form
{

    #[Validate('alpha_num')]
    public $opd_id = '';

    #[Validate('alpha_num')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    #[Validate('alpha_num')]
    public $S1 = '';
    #[Validate('alpha_num')]
    public $L1 = '';
    #[Validate('alpha_num')]
    public $L2 = '';
    #[Validate('alpha_num')]
    public $L3 = '';
    #[Validate('alpha_num')]
    public $L4 = '';
    #[Validate('alpha_num')]
    public $L5 = '';

    #[Validate('alpha_num')]
    public $comment_entered_by = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = null;
    
}